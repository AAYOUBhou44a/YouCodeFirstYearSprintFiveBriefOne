<?php
namespace App\Interfaces;

use App\Models\Classe;

interface IClassRepository {
    public function getAll(): array;
    public function getClassByTeacherId(int $id): ?Classe; // Probably should return array if one teacher has multiple classes, but requirement says "manage his/her classes". Schema has unique teacherId? No, schema says teacherId INT NOT NULL UNIQUE in original, but I fixed it?
    // My schema update: "teacherId INT NOT NULL, UNIQUE (teacherId)" was in original. I kept it?
    // Let's check schema again. I kept "teacherId INT NOT NULL UNIQUE" in the original view?
    // Actually in my replace_content I used: `teacherId INT NOT NULL` and `FOREIGN KEY ...`. I did NOT explicitly add UNIQUE.
    // However, `getAll` is good for admin.
    public function addClass(Classe $classe): bool;
    public function updateClass(Classe $classe): bool;
    public function deleteClass($id): bool;
    public function getById(int $id): ?Classe;
}


?>