<?php
namespace App\Controllers;

use App\Interfaces\IBriefRepository;
use App\Interfaces\ISprintRepository;
use App\Interfaces\ISkillRepository;
use App\Models\Brief;
use DateTime;

use App\Interfaces\IUserRepository;
use App\Interfaces\IEvaluationRepository;
use App\Models\Evaluation;

class TeacherController extends Controller {
    private IBriefRepository $briefRepo;
    private ISprintRepository $sprintRepo;
    private ISkillRepository $skillRepo;
    private IUserRepository $userRepo;
    private IEvaluationRepository $evalRepo;

    public function __construct(
        IBriefRepository $briefRepo, 
        ISprintRepository $sprintRepo, 
        ISkillRepository $skillRepo,
        IUserRepository $userRepo,
        IEvaluationRepository $evalRepo
    ) {
        parent::__construct();
        $this->briefRepo = $briefRepo;
        $this->sprintRepo = $sprintRepo;
        $this->skillRepo = $skillRepo;
        $this->userRepo = $userRepo;
        $this->evalRepo = $evalRepo;
    }

    public function indexBriefs() {
        // Ideally filter by teacher's classes
        $briefs = $this->briefRepo->getAll(); 
        $this->render('teacher/briefs/index.html.twig', ['briefs' => $briefs]);
    }

    public function createBrief() {
        $sprints = $this->sprintRepo->getAll();
        $skills = $this->skillRepo->getAll();
        $this->render('teacher/briefs/create.html.twig', [
            'sprints' => $sprints,
            'skills' => $skills
        ]);
    }

    public function storeBrief() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $type = $_POST['type'];
            $sprintId = (int)$_POST['sprint_id'];
            $startDate = new DateTime($_POST['start_date']);
            $endDate = new DateTime($_POST['end_date']);
            $skills = isset($_POST['skills']) ? $_POST['skills'] : []; // Array of IDs

            if (empty($title) || empty($description) || $sprintId <= 0) {
                echo "Champs invalides";
                return;
            }

            $brief = new Brief(0, $title, $description, '', $type, $sprintId, 0, $startDate, $endDate);
            
            $this->briefRepo->add($brief, $skills);
            header("Location: /debriefing/briefs");
        }
    }

    public function evaluateBrief() {
        $briefId = $_GET['id'] ?? 0;
        $brief = $this->briefRepo->getById($briefId);
        if (!$brief) {
            echo "Brief non trouvé";
            return;
        }

        // Get students. 
        // Logic: Brief -> Sprint -> Class (id/property?) -> Students.
        // Brief model does not have classId (I inferred default 0). 
        // But Sprint has classId.
        // So fetch Sprint.
        $sprint = $this->sprintRepo->getById($brief->getSprintId());
        // Then get students by class.
        $students = $this->userRepo->getByClass($sprint->getClassId());

        $this->render('teacher/evaluations/students_list.html.twig', [
            'brief' => $brief, 
            'students' => $students
        ]);
    }

    public function evaluateStudent() {
        $briefId = $_GET['brief_id'] ?? 0;
        $studentId = $_GET['student_id'] ?? 0;

        $brief = $this->briefRepo->getById($briefId);
        $student = $this->userRepo->getById($studentId);
        
        // Get Brief Skills
        $skills = $this->briefRepo->getSkillsByBrief($briefId); // Returns array of cols (id, code, title)
        
        // Get existing evaluations
        $existingEvals = $this->evalRepo->getByBriefAndStudent($briefId, $studentId);
        // Map existing evals by skillId for easy lookup in view
        $evalMap = [];
        foreach ($existingEvals as $e) {
            $evalMap[$e->getSkillId()] = $e;
        }

        $this->render('teacher/evaluations/form.html.twig', [
            'brief' => $brief,
            'student' => $student,
            'skills' => $skills, // Array of arrays? Repo returns fetchAll assoc? Yes.
            'evalMap' => $evalMap
        ]);
    }

    public function storeEvaluation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $briefId = (int)$_POST['brief_id'];
            $studentId = (int)$_POST['student_id'];
            
            // Evaluated by current user (Teacher)
            // Session user
            $teacherId = $_SESSION['user']->getId();

            $levels = $_POST['level'] ?? []; // Map skill_id => level
            $comments = $_POST['comment'] ?? []; // Map skill_id => comment

            foreach ($levels as $skillId => $level) {
                $comment = $comments[$skillId] ?? null;
                $eval = new Evaluation(0, $studentId, $briefId, $skillId, $level, $comment, $teacherId);
                $this->evalRepo->save($eval);
            }

            header("Location: /debriefing/evaluations/brief?id=" . $briefId);
        }
    }
}
