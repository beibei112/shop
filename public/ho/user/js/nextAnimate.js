
// 待完善
// 待改进功能：
	// 1. 当出现loading提示框时 不可点击其他元素
	// 2. 细节的处理 
	// 3. 兼容移动端(样式)
	// 4. 脱离jquery 改写成原生JS的

	// 11月4日写


// 加载中
nextAnimate.prototype.loading=function(mes){

	$(this.loadingElement).append($(this.loadingIcon));
	$(this.loadingElement).append('&nbsp;&nbsp;<span style="opacity:0.3;font-size:12px;" >'+mes+'<span>');

	$(this.loadingElement).children().css({
		opacity:'1',
		transition:'all '+this.tranTime+'s'
	});

	$(this.loadingElement).css({
		backgroundColor:'rgba(0,0,0,0.5)',
		width:'105px',
		height:'50px',
		opacity:0,
		paddingLeft:'10px',
		paddingTop:'10px',
		boxSizing:'border-box',
		position:'absolute',
		color:'white',
		cursor:'default',
		userSelect: 'none',
		borderRadius:'3px',
		transition:'all 1s',
		left:($(document).width() - $('#loading').width())/2 - 85 + 'px',
		top:($(document).height() - $('#loading').height())/2 - 30 + 'px',
		zIndex:10000,
	}).appendTo($('body'));

	setTimeout(function(){
		$(this.loadingElement).css('opacity',1);
	}.bind(this),100);
}

// 加载完毕
nextAnimate.prototype.finish=function(mes){

	$(this.loadingElement).children().css('opacity',0);

	setTimeout(function(){

		// 清除子元素
		$(this.loadingElement).html('').css({
			paddingTop:'8px',
			textAlign:'center'
		}).children().remove();

		// 对勾图标的父亲元素
		var allowIconFather = $('<span style="" ></span>').css({
			opacity:0,
			overFlow:'hidden',
			transition:'all 0.4s',
		});

		// 对勾图标元素
		var allowIcon = $(this.finishIcon).css('margin-bottom','0px');;

		// 成功
		var allowSpan = $('<span >'+mes+'</span>');

		$(allowIconFather).append($(allowSpan)).append($(allowIcon)).appendTo($(this.loadingElement));

		setTimeout(function(){
			$(allowIconFather).css({
				opacity:1,
			});
		},100);


	}.bind(this),this.tranTime*1000);

}

// 取消
nextAnimate.prototype.cancel=function(){

	$(this.loadingElement).css({
		opacity:0
	});

	setTimeout(function(){
		$(this.loadingElement).remove();
		this.loadingElement = $('<span id="loading" >&nbsp;</span>');
	}.bind(this),this.tranTime*2000);

}

function nextAnimate(loadingIcon,finishIcon){

	this.finishIcon = $(finishIcon).css('width','35px');
	this.loadingIcon = $(loadingIcon).css('width','30px');

	// loading 元素
	this.loadingElement = $('<span id="loading" >&nbsp;</span>'); //<img style="width:35px;" src="__PUBLIC__/images/loading2.gif" 

	// 子元素 过渡时间
	this.tranTime = 0.3;

}


// var loadingEle =  $('<img src="__PUBLIC__/images/loading2.gif" />')
// var finishEle = $('<img src="__PUBLIC__/images/selected.png" />');
// var nextAnimate = new nextAnimate(loadingEle,finishEle);
// nextAnimate.loading('设置中');
// setTimeout(function(){
// 	nextAnimate.finish('完成');
// 	setTimeout(function(){
// 		nextAnimate.cancel();
// 	},1000);
// },2000);