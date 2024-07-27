    $(document).ready(function(){
        //Course section
        function fetchCourse(){
            $.ajax({
                url:"fetchCourses.php",
                type:"post",
                success:function(result){
                   $("#courses-list").html(result);
                }
            })
        };
        fetchCourse();
        $("#myForm").on("submit",function(e){
            e.preventDefault();
            var coursename = $("#courseName").val();
            $.ajax({
                url:"addCourseData.php",
                type:"POST",
                data:{courseName:coursename},
                success:function(success){
                    alert(success);
                    fetchCourse();
                    
                }
            })
        });
       $(document).on("click",".EditCourse",function(){
       var id = $(this).attr("cid");
       $.ajax({
        url:"CourseWithId.php",
        type:"POST",
        data:{cid:id},
        success:function(result){
            $(".fetchModalBody").html(result);
        }
       })
       });
       $(document).on("submit","#EditForm",function(e){
        e.preventDefault();
        var courseID = $("#courseID").val();
        var courseName = $("#UpdCName").val();
        $.ajax({
            url:"UpdateCourse.php",
            type:"post",
            data:{cid:courseID,cname:courseName},
            success:function(result){
                alert(result);
                fetchCourse();
            }
        });
       })
       $(document).on("click",".DeltCourse",function(){
        var id = $(this).attr("cid");
            $.ajax({
                url:"DeletePermission.php",
                type:"post",
                data:{cid:id},
                success:function(result){
                    $(".DeletePermissionBody").html(result);
                }
            })
       });
       $(document).on("submit","#DeleteCourse",function(e){
        e.preventDefault();
        var id = $("#cDeltId").attr("courid");
        $.ajax({
            url:"delete.php",
            type:"post",
            data:{cid:id},
            success:function(result){
                fetchCourse();
                alert(result);
            }
        })
       });
       //Language Section
       function fetchLanguage(){
        $.ajax({
            url:"fetchLang.php",
            type:"post",
            success:function(result){
               $("#language-list").html(result);
            }
        })
    };
    fetchLanguage();
       $("#langForm").on("submit",function(e){
        e.preventDefault();
        var langname = $("#langName").val();
        var course = $("#course").val();
        $.ajax({
            url:"addLang.php",
            type:"POST",
            data:{cid:course,langName:langname},
            success:function(success){
                alert(success);
                fetchLanguage();
                
            }
        })
    });
    $(document).on("click",".EditLanguage",function(){
        var id = $(this).attr("cid");
        $.ajax({
         url:"LangWithId.php",
         type:"POST",
         data:{cid:id},
         success:function(result){
             $(".LangModal").html(result);
         }
        })
        });
          $(document).on("submit","#EditLangForm",function(e){
        e.preventDefault();
        var langID = $("#langID").val();
        var langName = $("#UpdLangName").val();
        var courseId = $("#courseId").val();
        $.ajax({
            url:"UpdateLanguage.php",
            type:"post",
            data:{courseID:courseId,cid:langID,cname:langName},
            success:function(result){
                alert(result);
                fetchLanguage();
            }
        });
       })
       $(document).on("click",".Deltlang",function(){
        var id = $(this).attr("cid");
            $.ajax({
                url:"DeleteLangPermission.php",
                type:"post",
                data:{cid:id},
                success:function(result){
                    $(".DeleteLangPermissionBody").html(result);
                }
            })
       });
       $(document).on("submit","#DeleteLanguage",function(e){
        e.preventDefault();
        var id = $("#LangDeltId").attr("langid");
        $.ajax({
            url:"deletelang.php",
            type:"post",
            data:{cid:id},
            success:function(result){
                alert(result);
                fetchLanguage();
            }
        })
       });
       // lecture section
       function fetchingLecture(){
        $.ajax({
            url:"fetchLecture.php",
            type:"post",
            success:function(result){
               $("#lecture-list").html(result);
            }
        })
    };
    fetchingLecture();
    $("#lectureForm").on("submit",function(e){
        e.preventDefault();
          var formdata  = new FormData(this);
    
        $.ajax({
            url:"addLecture.php",
            type:"POST",
            data:formdata,
            contentType : false,
            processData : false,
            success:function(success){
                alert(success);
                fetchingLecture();
                
            }
        })
    });
    $(document).on("click",".EditLectureBtn",function(){
        var Lid = $(this).attr("lectid");
        $.ajax({
         url:"LectureWithId.php",
         type:"POST",
         data:{lectid:Lid},
         success:function(result){
             $(".LectureBody").html(result);
             
         }
        })
        });
        $(document).on("submit", "#EditLectureForm", function(e) {
            e.preventDefault();
            var formData = new FormData(this);
        
            $.ajax({
                url: "updateLecture.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert(response);
                    fetchingLecture();
                },
                error: function(xhr, status, error) {
                    alert("An error occurred: " + error);
                }
            });
        });
        
           $(document).on("click",".DeltLectureBtn",function(){
            var id = $(this).attr("lectid");
                $.ajax({
                    url:"DeleteLectPermission.php",
                    type:"post",
                    data:{cid:id},
                    success:function(result){
                        $(".DeleteLecturePermissionBody").html(result);
                    }
                })
           });
           $(document).on("submit","#lectDeltForm",function(e){
            e.preventDefault();
            var id = $("#lectID").attr("leid");
            alert(id);
            $.ajax({
                url:"deleteLecture.php",
                type:"post",
                data:{cid:id},
                
                success:function(result){
                    fetchingLecture();
                    alert(result);
                }
            })
           });
           //User Section
           function fetchUser(){
            $.ajax({
                url:"fetchuser.php",
                type:"post",
                success:function(result){
                   $("#user-list").html(result);
                }
            })
           }
           fetchUser();
           $(document).on("click",".EditUserBtn",function(){
          var uid = $(this).attr("uid");
            $.ajax({
                url:"userWithId.php",
                type:"POST",
                data:{UID:uid},
                success:function(result){
                    $(".userModalBody").html(result);
                }
            })
           });
        $(document).on("change","#userStatus",function(){
            var uid = $(this).attr('uid');
           var status = $(this).val();
            $.ajax({
                url:"editUser.php",
                type:"POST",
                data:{txtuid:uid,txtstatus:status},
                success:function(result){
                    alert(result);
                    fetchUser();
                }
            })
        })
    });