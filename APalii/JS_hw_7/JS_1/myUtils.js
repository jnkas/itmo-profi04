(function(){
	myUtils = {
		seek_max:function(arr){
			var max = arr[arr.length-1];
			for(var i = 0; i < arr.length; i++){ 
			    if ( arr[i] > max ){
					max = arr[i];
				}
			}
			return max;
		},
		
		seek_min:function(arr_b){
			var min = arr_b[arr_b.length-1];
			for(var i = 0; i < arr_b.length; i++){ 
			    if ( arr_b[i] < min ){
					min = arr_b[i];
				}
			}
			return min;
		},
		
		
		average_calc:function(arr_c){
			var average = "";
			var sum = 0;
			for(var i = 0; i < arr_c.length; i++){ 
			    sum += arr_c[i];
			}
			average = sum/arr_c.length;
			return average;
		},
		
		clone_arr:function(arr_d){
			var clone = "";
			clone = arr_d;
			return clone;
		},

	}	
}());