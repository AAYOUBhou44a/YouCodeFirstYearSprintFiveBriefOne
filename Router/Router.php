<?php
namespace Router;

class Router {
    public function getPath($page) {
        $pages = [
            "debriefing/login" => ["App\Controllers\AuthController", "showLogin"],
            "debriefing/submit_login" => ["App\Controllers\AuthController", "submitLogin"],
            "debriefing/home" => ["App\Controllers\HomeController", "index"],
            "debriefing/logout" => ["App\Controllers\AuthController", "logout"],

            // Admin Routes - Classes
            "debriefing/classes" => ["App\Controllers\AdminController", "indexClasses"],
            "debriefing/classes/create" => ["App\Controllers\AdminController", "createClass"],
            "debriefing/classes/store" => ["App\Controllers\AdminController", "storeClass"],

            // Admin Routes - Sprints
            "debriefing/sprints" => ["App\Controllers\AdminController", "indexSprints"],
            "debriefing/sprints/create" => ["App\Controllers\AdminController", "createSprint"],
            "debriefing/sprints/store" => ["App\Controllers\AdminController", "storeSprint"],

            // Admin Routes - Users
            "debriefing/users" => ["App\Controllers\AdminController", "indexUsers"],
            "debriefing/users/create" => ["App\Controllers\AdminController", "createUser"],
            "debriefing/users/store" => ["App\Controllers\AdminController", "storeUser"],

            // Admin Routes - Skills
            "debriefing/skills" => ["App\Controllers\AdminController", "indexSkills"],
            "debriefing/skills/create" => ["App\Controllers\AdminController", "createSkill"],
            "debriefing/skills/store" => ["App\Controllers\AdminController", "storeSkill"],

            // Teacher Routes - Briefs
            "debriefing/briefs" => ["App\Controllers\TeacherController", "indexBriefs"],
            "debriefing/briefs/create" => ["App\Controllers\TeacherController", "createBrief"],
            "debriefing/briefs/store" => ["App\Controllers\TeacherController", "storeBrief"],

            // Evaluations
            "debriefing/evaluations/brief" => ["App\Controllers\TeacherController", "evaluateBrief"],
            "debriefing/evaluations/student" => ["App\Controllers\TeacherController", "evaluateStudent"],
            "debriefing/evaluations/store" => ["App\Controllers\TeacherController", "storeEvaluation"],

            // Student Routes
            "debriefing/my-briefs" => ["App\Controllers\StudentController", "indexBriefs"],
            "debriefing/progression" => ["App\Controllers\StudentController", "viewProgression"],
        ];

        if (isset($pages[$page])) {
            return $pages[$page];
        } else {
            // Retourne un contrôleur d'erreur ou une route par défaut cohérente
            return ["App\Controllers\ErrorController", "notFound"];
        }
    }
}