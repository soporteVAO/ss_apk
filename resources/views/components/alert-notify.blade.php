

@if (Session::has('success') || Session::has('warning') || Session::has('danger'))
<script>
        jQuery(function($){
            
        })

    </script>
    <script>
        jQuery(function($){
            function showNotification(msg, type){
                // color = Math.floor((Math.random() * 4) + 1);

                $.notify({
                    icon: "fa-solid fa-circle-check",
                    // message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."
                    message: msg

                },{
                    type: type,
                    timer: 4000,
                    placement: {
                        // from: from,
                        from: 'top',
                        // align: align
                        align: 'right'
                    }
                });
            }
            @if (Session::has('success'))
        
            var msg = "{{Session::get('success')}}";
            var type = 'success';
            jQuery(($)=>{
                $(document).ready(showNotification(msg, type));
            })
        
            @elseif (Session::has('warning'))
                
                    var msg = "{{Session::get('warning')}}";
                    var type = 'warning';
                    jQuery(($)=>{
                        $(document).ready(showNotification(msg, type));
                    })
                
            @elseif (Session::has('danger'))
                
                    var msg = "{{Session::get('danger')}}";
                    var type = 'danger';
                    jQuery(($)=>{
                        $(document).ready(showNotification(msg, type));
                    })
                
            @endif
        });
    
    
    </script>
@endif