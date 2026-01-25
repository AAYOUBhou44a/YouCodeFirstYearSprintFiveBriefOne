<?php
namespace App\Controllers;

use App\Interfaces\IBriefRepository;
use App\Interfaces\ISprintRepository;
use App\Interfaces\IEvaluationRepository;
use App\Models\Student;

class StudentController extends Controller {
    private IBriefRepository $briefRepo;
    private ISprintRepository $sprintRepo;
    private IEvaluationRepository $evalRepo;

    public function __construct(IBriefRepository $briefRepo, ISprintRepository $sprintRepo, IEvaluationRepository $evalRepo) {
        parent::__construct();
        $this->briefRepo = $briefRepo;
        $this->sprintRepo = $sprintRepo;
        $this->evalRepo = $evalRepo;
    }

    public function indexBriefs() {
        $user = $_SESSION['user'] ?? null;
        if (!$user || $user->getRole() !== 'student') {
            header("Location: /debriefing/login");
            exit;
        }

        // Get sprints for student's class
        $sprints = $this->sprintRepo->getByClassId($user->getClassId());
        
        $briefs = [];
        foreach ($sprints as $sprint) {
            $sprintBriefs = $this->briefRepo->getBySprintId($sprint->getId());
            foreach ($sprintBriefs as $brief) {
                $briefs[] = [
                    'brief' => $brief,
                    'sprint' => $sprint
                ];
            }
        }

        $this->render('student/briefs/index.html.twig', ['briefs' => $briefs]);
    }

    public function viewProgression() {
        $user = $_SESSION['user'] ?? null;
        if (!$user || $user->getRole() !== 'student') {
            header("Location: /debriefing/login");
            exit;
        }
        
        // This is a simplified "Progression" view - listing all evaluations could be complex.
        // For now, let's list brief by brief status? 
        // Or just list ALL evaluations flat? Or grouped by Brief?
        // Let's iterate all briefs assigned to student (like above) and fetch evaluations for each.
        
        $sprints = $this->sprintRepo->getByClassId($user->getClassId());
        
        $progression = [];
        foreach ($sprints as $sprint) {
            $sprintBriefs = $this->briefRepo->getBySprintId($sprint->getId());
            foreach ($sprintBriefs as $brief) {
                $evals = $this->evalRepo->getByBriefAndStudent($brief->getId(), $user->getId());
                if (!empty($evals)) {
                    $progression[] = [
                        'brief' => $brief,
                        'evaluations' => $evals
                    ];
                }
            }
        }

        $this->render('student/progression/index.html.twig', ['progression' => $progression]);
    }
}
