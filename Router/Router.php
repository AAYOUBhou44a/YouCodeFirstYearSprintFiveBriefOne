<?php
namespace Router;

class Router{
    public function getPath($page){

        $pages = [
            "debriefing" => "views/login",
            "debriefing/classes" => "views/admin/classes",
            "debriefing/skills" => "views/admin/skills",
            "debriefing/sprints" => "views/admin/sprints",
            "debriefing/briefs_list" => "views/teacher/briefs_list",
            "debriefing/debriefing_form" => "views/teacher/debriefing_form",
            "debriefing/student_history" => "views/teacher/student_history",
            "debriefing/my_briefs" => "views/teacher/my_briefs",
            "debriefing/my_progress" => "views/teacher/my_progress",
            "debriefing/login" => "views/shared/login",
            "debriefing/profile" => "views/shared/profile",
        ];

        if(isset($pages[$page])){
                return $pages[$page];
            }
            else{
                return "views/404";
            }
    }
}

?>