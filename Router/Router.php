<?php
namespace Router;

class Router{
    public function getPath($page){

        $pages = [
            "" => "views/home",
            "debriefing" => "views/home",
            "debriefing/public" => "views/classes",
            "debriefing/views" => "views/home",
            "debriefing/views/admin" => "views/admin/classes",
            "debriefing/views/admin/classes" => "views/admin/classes",
            "debriefing/views/admin/skills" => "views/admin/skills",
            "debriefing/views/admin/sprints" => "views/admin/sprints",
            "debriefing/views/teacher" => "views/teacher/briefs_list",
            "debriefing/views/teacher/briefs_list" => "views/teacher/briefs_list",
            "debriefing/views/teacher/debriefing_form" => "views/teacher/debriefing_form",
            "debriefing/views/teacher/student_history" => "views/teacher/student_history",
            "debriefing/views/student" => "views/teacher/my_briefs",
            "debriefing/views/student/my_briefs" => "views/teacher/my_briefs",
            "debriefing/views/student/my_progress" => "views/teacher/my_progress",
            "debriefing/views/shared/login" => "views/shared/login",
            "debriefing/views/shared/profile" => "views/shared/profile",
        ];

        if(isset($page, $pages)){
                return $pages[$page];
            }
            else{
                return "views/404";
            }
    }
}

?>