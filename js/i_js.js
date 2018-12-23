var btn = false;
$('form[doajax=\'1\']').submit(function(e)
{
  return false;
  e.preventDefault();
  if($('form[doajax=\'1\']').data('return')!='')
  {
    do_submit($('form[doajax=\'1\']'),$('form[doajax=\'1\']').data('return'));
  }
  else
  {
    do_submit($('form[doajax=\'1\']'),'#return');
  }
  return true;
});
function warp_to(selct)
{
  $("html, body").animate({ scrollTop: $(selct).offset().top }, 120);
}
$(function()
{
  $('[do="submit"]').click(function()
  {
    do_submit('#main','#return');
    btn = $('[do="submit"]').button('loading');
  });
  $('form[doajax=\'1\']').submit(function(e)
  {

    e.preventDefault();
    if($('form[doajax=\'1\']').data('return')!='')
    {
      do_submit($('form[doajax=\'1\']'),$('form[doajax=\'1\']').data('return'));
    }
    else
    {
      do_submit($('form[doajax=\'1\']'),'#return');
    }
    return false;
  });
});

function do_submit(form,return_id)
{

$.ajax({
      type: "POST",
      url: "index.php",
      data: $(form).serialize(),
      beforeSend: function() {
        $(return_id).html('<div class="alert alert-info"><i class="fa fa-spinner fa-spin fa-lg"></i> ระบบกำลังทำงาน..</div>');
        $('input').attr('readonly', true);
    },
    success: function(data)
    {
      $('input').removeAttr('readonly');
      $(return_id).html(data);
    }
  })
}


  $(function(){

    $('[data-toggle="tooltip_visb"]').tooltip({trigger: 'manual'}).tooltip('show');


  });
  function ajax_page_load(xurl,return_id)
{
  $.ajax({
        type: "GET",
        url: xurl,
        success: function(data)
        {
          $(return_id).html(data);
        }
    })
}
