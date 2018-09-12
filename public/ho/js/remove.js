function remove(obj){

	var tr = $(obj).parents('tr');
	var id = tr.attr('info');

	$.ajax({
		url:'http://localhost/ThinkPhp/index.php/Home/cart/del',
		data:{id:id},
		type:'post',
		success:function(){
			//删除这一行
			tr.remove();
			// window.location.href=window.location.href;
			window.location.reload();
		}
	});
}