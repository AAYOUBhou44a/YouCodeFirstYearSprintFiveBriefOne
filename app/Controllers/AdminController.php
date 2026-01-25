<?php
namespace App\Controllers;

use App\Interfaces\IClassRepository;
use App\Interfaces\ISprintRepository;
use App\Interfaces\IUserRepository;
use App\Interfaces\ISkillRepository;
use App\Models\Classe;
use App\Models\Sprint;
use App\Models\Skill; 
use DateTime;

class AdminController extends Controller {
    private IClassRepository $classRepo;
    private ISprintRepository $sprintRepo;
    private IUserRepository $userRepo;
    private ISkillRepository $skillRepo;

    public function __construct(IClassRepository $classRepo, ISprintRepository $sprintRepo, IUserRepository $userRepo, ISkillRepository $skillRepo) {
        parent::__construct();
        $this->classRepo = $classRepo;
        $this->sprintRepo = $sprintRepo;
        $this->userRepo = $userRepo;
        $this->skillRepo = $skillRepo;
    }

    public function indexClasses() {
        $classes = $this->classRepo->getAll();
        $this->render('admin/classes/index.html.twig', ['classes' => $classes]);
    }

    public function createClass() {
        // We need list of teachers to assign
        $teachers = $this->userRepo->getByRole('teacher');
        $this->render('admin/classes/create.html.twig', ['teachers' => $teachers]);
    }

    public function storeClass() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $teacherId = (int)$_POST['teacher_id'];

            if(empty($name) || $teacherId <= 0) {
                // Should show error
                echo "Erreur saisie"; 
                return;
            }

            $classe = new Classe(0, $name, $teacherId); // ID 0 for new
            $this->classRepo->addClass($classe);
            header("Location: /debriefing/classes");
        }
    }

    public function indexSprints() {
        $sprints = $this->sprintRepo->getAll();
        $this->render('admin/sprints/index.html.twig', ['sprints' => $sprints]);
    }

    public function createSprint() {
        $classes = $this->classRepo->getAll();
        $this->render('admin/sprints/create.html.twig', ['classes' => $classes]);
    }

    public function storeSprint() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $startDate = new DateTime($_POST['start_date']);
            $endDate = new DateTime($_POST['end_date']);
            $classId = (int)$_POST['class_id'];

            if(empty($name) || $classId <= 0) {
                // Error
                 echo "Erreur saisie";
                 return;
            }

            $sprint = new Sprint(0, $name, $startDate, $endDate, $classId);
            $this->sprintRepo->add($sprint);
            header("Location: /debriefing/sprints");
        }
    }

    public function indexUsers() {
        $users = $this->userRepo->getAll();
        $this->render('admin/users/index.html.twig', ['users' => $users]);
    }

    public function createUser() {
        $classes = $this->classRepo->getAll();
        $this->render('admin/users/create.html.twig', ['classes' => $classes]);
    }

    public function storeUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = trim($_POST['first_name']);
            $lastName = trim($_POST['last_name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $role = $_POST['role'];
            $classId = isset($_POST['class_id']) && !empty($_POST['class_id']) ? (int)$_POST['class_id'] : null;

            if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($role)) {
                echo "Champs manquants";
                return;
            }

            // Hashing password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $data = [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'password' => $hashedPassword,
                'role' => $role,
                'class_id' => $classId
            ];

            $this->userRepo->add($data);
            header("Location: /debriefing/users");
        }
    }

    public function indexSkills(){
        $skills = $this->skillRepo->getAll();
        $this->render('admin/skills/index.html.twig', ['skills' => $skills]);
    }

    public function createSkill(){
        $this->render('admin/skills/create.html.twig');
    }

    public function storeSkill(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $code = trim($_POST['code']);
            $title = trim($_POST['title']);

            if(empty($code) || empty($title)){
                echo "Champs invalides";
                return;
            }

            $skill = new Skill(0, $code, $title);
            $this->skillRepo->add($skill);
            header("Location: /debriefing/skills");
        }
    }
}
