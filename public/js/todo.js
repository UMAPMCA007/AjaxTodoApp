
    $(document).ready(function () {
        view();
        function view(){
            $.ajax({
                type:'get',
                url:'view_todos',
                success:function(data){
                    var tasks=data.todos;
                    $.each(tasks,function(index,val){
                        var task=val.todo_name;
                        var id= val.id;
                        var completed=val.completed;
                        var check="<i class='fas fa-check-square'></i>";
                        var del="<i class='fas fa-trash' ></i>";
                        var edit="<i class='fas fa-edit' ></i>";
                        var ids ='<p>'+id+'</p>';
                        if(completed == 1){
                            var input='<textarea type="text"  class="line"  style="width:450px;" readonly>'+task+'</textarea>';
                            var li='<li class="line" >'+ids+input+del+edit+check+'</li>';
                        }else{
                            var input='<textarea type="text"  class=""  style="width:450px;" readonly>'+task+'</textarea>'
                            var li='<li class="" >'+ids+input+del+edit+check+'</li>';
                        }

                        $("#list").append(li);
                    });
                    $('#list').children('li').children('.fas.fa-check-square').click(function () {
                            $(this).parent('li').children('textarea').toggleClass('line');

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type:'put',
                            url:'update_todo',
                            data:{id:$(this).parent('li').children('p').text()},
                            success:function(data){
                                /*console.log(data);*/

                            }
                        });

                    });
                    $('#list').children('li').children('.fas.fa-edit').click(function (e) {
                        $(this).parent('li').children('textarea').toggleClass('textarea');
                        $(this).parent('li').children('textarea').prop('readonly',false);
                        $(this).parent('li').children('textarea').on("keypress",function (e) {
                            var todo=$(this).parent('li').children('textarea').val();
                            var id=$(this).parent('li').children('p').text();
                            var textareaRC=$(this).parent('li').children('textarea');
                            var textareaRO=$(this).parent('li').children('textarea');
                            edit(todo,id,e,textareaRC,textareaRO);

                        });
                        e.preventDefault();

                    });
                    $('#list').children('li').children('.fas.fa-trash').click(function () {
                        $(this).parent('li').fadeOut();
                        $.ajax({
                            type:'delete',
                            url:'delete_todo',
                            data:{id:$(this).parent('li').children('p').text()},
                            success:function(data){
                                console.log(data);

                            }
                        });
                    });
                }

            });
        }

        $("#task").on("keypress",function (e) {
            var task=$('#task').val();
            if(e.which ===13 && $.trim(task)!==0 ){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                     type:'post',
                     url:'store_todos',
                     data:{todo:task},
                    success:function(data){

                    }
                });
                $('#task').val("");
                $('#list').html(" ");
                view();
            }

        });

        function edit(data,id,event,RC,RO){

            if(event.which ===13 && $.trim(data)!==0 ){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'put',
                    url:'edit_todo',
                    data:{id:id,todo:data},
                    success:function(data){


                    }
                });

                RC.removeClass('textarea');
                RO.prop('readonly',true);
                event.preventDefault();
            }

        }

});
