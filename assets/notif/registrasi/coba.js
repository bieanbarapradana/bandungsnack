
        function generate(type, text) {

            var n = noty({
                text        : text,
                type        : type,
                dismissQueue: true,
                layout      : 'topRight',
                closeWith   : ['click'],
                theme       : 'relax',
                maxVisible  : 10,
                animation   : {
                    open  : 'animated bounceInRight',
                    close : 'animated bounceOutRight',
                    easing: 'swing',
                    speed : 500
                }
            });
            console.log('html: ' + n.options.id);
        }

        function generateAll() {

            generate('information', '<div class="activity-item"> <center><div class="activity"><p style="font-size:12pt;">information</p> There are <a href="#">6 new tasks</a> waiting for you. Don\'t forget! <span>About 3 hours ago</span> </div></center> </div>');
          
//            generate('notification');
//            generate('success');
        }

        $(document).ready(function () {

            setTimeout(function() {
                generateAll();
            }, 500);

        });