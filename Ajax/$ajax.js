function queryString(obj){
				var str=''
				for(let key in obj){
					str+=key+'='+obj[key]+'&'
				}
				return str.substring(0,str.length-1);
			}
			function $ajax({method='get',url,data,success,error}){
				if(data){
					/* 字符串转对象 */
					// data=queryString(data);
					data=JSON.stringify(data);
				}
				/* 1.创建ajax对象 */
				/* 兼容性处理 */
				var xhr=null
				try{
					xhr=new XMLHttpRequest();
				}catch(error){
					xhr=new ActiveXObject('Microsoft.XMLHTTP')
				}
				/* 2.调用open */
				method=method.toLowerCase();
				if(method=='get'&&data){
					url+='?'+data
				}
				xhr.open(method,url,true);
				/* 3.调用send */
				if(method=='get'){
					xhr.send()
				}else{
					/*post 请求头格式 */
					xhr.setRequestHeader('content-type','application/x-www-form-urlencoded')
					xhr.send(data)
				}
				/* 4.等待请求数据响应 */
				xhr.onreadystatechange=function(){
					/* 判断响应数据是否请求完成 */
					if(xhr.readyState==4){
						if(xhr.status==200){
							/* 请求成功回调函数 */
							success(xhr.responseText)
						}else{
							if(error){
								/* 请求失败回调函数 */
								error(xhr.status)
							}
						}
					}
				}
			}
	

