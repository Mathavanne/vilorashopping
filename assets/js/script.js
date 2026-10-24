 $(document).ready( function () {
 	    $('.table').DataTable();
 	    $('.js-example-basic-multiple').select2();

} );

 
 $(function(){ 
  var url      = window.location.href;      
    $('#main-menu li a').each(function(){
        var $this = $(this); 
        if($this.attr('href')== url){
            $this.parent('li').addClass('active');
        }
    })
});