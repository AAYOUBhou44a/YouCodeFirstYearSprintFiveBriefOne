namespace App\Models;

class Student extends User {
    private ?int $classId; // Nullable if not assigned yet

    public function __construct($id, $firstName, $lastName, $email, $password, ?int $classId = null) {
        parent::__construct($id, $firstName, $lastName, $email, $password, "student");
        $this->classId = $classId;
    }

    public function getClassId(): ?int {
        return $this->classId;
    }
}

?>