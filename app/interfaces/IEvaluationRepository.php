<?php
namespace App\Interfaces;

use App\Models\Evaluation;

interface IEvaluationRepository {
    public function getByBriefAndStudent(int $briefId, int $studentId): array; // Returns array of Evaluation objects (one per skill)
    public function save(Evaluation $eval): bool; // Updates if exists, inserts if not
}
