$(document).ready(function () {
    //Course section
    function fetchCourse() {
        $.ajax({
            url: "fetchCourses.php",
            type: "post",
            success: function (result) {
                $("#courses-list").html(result);
            }
        })
    };
    fetchCourse();
    $("#myForm").on("submit", function (e) {
        e.preventDefault();
        var coursename = $("#courseName").val();
        $.ajax({
            url: "addCourseData.php",
            type: "POST",
            data: { courseName: coursename },
            success: function (response) {
                alert(response);
                fetchCourse();
                $("#course_modal").modal("hide");
            }
        })
    });
    $(document).on("click", ".EditCourse", function () {
        $("#EditCourse").modal("show");
        var id = $(this).attr("cid");
        var c_name = $(this).attr("c_name");
        $("#edit_course_id").val(id);
        $("#editcourseName").val(c_name);
    });
    $(document).on("submit", "#EditForm", function (e) {
        e.preventDefault();
        var courseID = $("#edit_course_id").val();
        var courseName = $("#editcourseName").val();
        $.ajax({
            url: "UpdateCourse.php",
            type: "post",
            data: { cid: courseID, cname: courseName },
            success: function (result) {
                alert(result);
                fetchCourse();
                $("#EditCourse").modal("hide");
            }
        });
    })
    $(document).on("click", ".DeltCourse", function () {
        var id = $(this).attr("cid");
        const confirmation = confirm("Are Your Sure you want to delete This Course?");
        if(confirmation){
            $.ajax({
                url: "delete_course.php",
                type: "post",
                data: { cid: id },
                success: function (result) {
                    console.log();
                    fetchCourse();
                }
            })
        }
    });

    //Language Section
    function fetchLanguage() {
        $.ajax({
            url: "fetchLang.php",
            type: "post",
            success: function (result) {
                $("#language-list").html(result);
            }
        })
    };
    fetchLanguage();
    $("#langForm").on("submit", function (e) {
        e.preventDefault();
        var langname = $("#langName").val();
        var course = $("#course").val();
        $.ajax({
            url: "addLang.php",
            type: "POST",
            data: { cid: course, langName: langname },
            success: function (success) {
                alert(success);
                fetchLanguage();
                $("#add_technology").modal("hide");
            }
        })
    });
    $(document).on("click", ".EditLanguage", function () {
        $("#update_technology").modal("show");
        var id = $(this).attr("id");
        var c_name = $(this).attr("t_name");
        var c_id = $(this).attr("cid");
        $("#editlangid").val(id);
        $("#editlangName").val(c_name);
        $("#editcourse").val(c_id);
    });
    $(document).on("submit", "#EditLangForm", function (e) { 
        e.preventDefault();
        var technology_id = $("#editlangid").val();
        var technology_name = $("#editlangName").val();
        var courseId = $("#editcourse").val();
        $.ajax({
            url: "UpdateLanguage.php",
            type: "post",
            data: { c_id: courseId, t_id: technology_id, tname: technology_name },
            success: function (result) {
                alert(result);
                fetchLanguage();
                $("#EditLangForm").trigger("reset");
                $("#update_technology").modal("hide");
            }
        });
    })
    $(document).on("click", ".Deltlang", function () {
        var id = $(this).attr("cid");
        const confirmation = confirm("Are Your Sure you Want to Delete this Techonology?");
        if(confirmation){
            $.ajax({
                url : "deletelang.php",
                type : "POST",
                data : {id:id},
                success:function(res){
                    alert(res)
                    fetchLanguage();
                }
            })
        }
    });
    // lecture section
    function fetchingLecture() {
        $.ajax({
            url: "fetchLecture.php",
            type: "post",
            success: function (result) {
                $("#lecture-list").html(result);
            }
        })
    };
    fetchingLecture();
    $("#lectureForm").on("submit", function (e) {
        e.preventDefault();
        var formdata = new FormData(this);
        $.ajax({
            url: "addLecture.php",
            type: "POST",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (success) {
                alert(success);
                fetchingLecture();
                $("#add_lecture").modal("hide");
            }
        })
    });
    $(document).on("click", ".EditLectureBtn", function () {
        $("#EditLectureModal").modal("show");
        var l_id = $(this).attr("lectid");
        var l_title = $(this).attr("title");
        var l_desc = $(this).attr("desc");
        var course = $(this).attr("course_id");
        var lang = $(this).attr("lang_id");
        var thumbnail = $(this).attr("thumbnail");
        var video = $(this).attr("video");
        $("#edit_lec_id_form").val(l_id);
        $("#edit_lec_id_v_t").val(l_id);
        $("#edit_lectureTitle").val(l_title);
        $("#edit_lectureDesc").val(l_desc);
        $("#edit_course").val(course);
        $("#edit_lang_id").val(lang);
        $("#edit_thumbnail_display").attr("poster", thumbnail);
        $("#edit_thumbnail_display").attr("src", video);
        $("#eidt_video_play").attr("src", video);
    });
    $(document).on("submit", "#EditLectureForm", function (e) {
        e.preventDefault();
        var thumbnail = $("#edit_thumbnail").val(); 
        var video = $("#edit_video").val(); 
        if(thumbnail || video != null){
            alert("success");
        }else{
            alert("failed");
        }
        // var formData = new FormData(this);

        // $.ajax({
        //     url: "updateLecture.php",
        //     type: "POST",
        //     data: formData,
        //     contentType: false,
        //     processData: false,
        //     success: function (response) {
        //         alert(response);
        //         fetchingLecture();
        //     },
        //     error: function (xhr, status, error) {
        //         alert("An error occurred: " + error);
        //     }
        // });
    });
    $(document).on("submit", "#video_thumbnail_form", function (e) {
        e.preventDefault();
        var thumbnail = $("#edit_thumbnail").val();
        var video = $("#edit_video").val();
        var formData = new FormData(this);
        // console.log(formData);
        if(thumbnail || video) {
            $.ajax({
                url: "update_video_thumbnail.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (res) {
                    alert(res);
                    fetchingLecture();
                    $("#EditLectureModal").modal("hide");
                }
            });
        } else {
            alert("Please upload at least one file: either a thumbnail or a video.");
        }
    });
    $(document).on("click", ".ViewLectureBtn", function(){
        var l_id = $(this).attr("lectid");
        var l_title = $(this).attr("title");
        var l_desc = $(this).attr("desc");
        var course = $(this).attr("course");
        var lang = $(this).attr("lang_name");
        var thumbnail = $(this).attr("thumbnail");
        var video = $(this).attr("video");
    
        $("#ViewLectureModal").modal("show");
        $("#view_lec_id").text(l_id);
        $("#view_lec_title").text(l_title);
        $("#view_lec_desc").text(l_desc);
        $("#view_course").text(course);
        $("#view_technology").text(lang);
        $("#view_thumbnail").attr("poster", thumbnail);
        $("#view_thumbnail").attr("src", video);
        $("#view_video").attr("src", video);
    });
    $(document).on("click", ".DeltLectureBtn", function () {
        var id = $(this).attr("lectid");
        $.ajax({
            url: "DeleteLectPermission.php",
            type: "post",
            data: { cid: id },
            success: function (result) {
                $(".DeleteLecturePermissionBody").html(result);
            }
        })
    });
    $(document).on("submit", "#lectDeltForm", function (e) {
        e.preventDefault();
        var id = $("#lectID").attr("leid");
        alert(id);
        $.ajax({
            url: "deleteLecture.php",
            type: "post",
            data: { cid: id },

            success: function (result) {
                fetchingLecture();
                alert(result);
            }
        })
    });
    //User Section
    function fetchUser() {
        $.ajax({
            url: "fetchuser.php",
            type: "post",
            success: function (result) {
                $("#user-list").html(result);
            }
        })
    }
    fetchUser();
    $(document).on("click", ".EditUserBtn", function () {
        var uid = $(this).attr("uid");
        $.ajax({
            url: "userWithId.php",
            type: "POST",
            data: { UID: uid },
            success: function (result) {
                $(".userModalBody").html(result);
            }
        })
    });
    $(document).on("change", "#userStatus", function () {
        var uid = $(this).attr('uid');
        var status = $(this).val();
        $.ajax({
            url: "editUser.php",
            type: "POST",
            data: { txtuid: uid, txtstatus: status },
            success: function (result) {
                alert(result);
                fetchUser();
            }
        })
    })
});