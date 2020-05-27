
function CountryCtrl($scope, $http){	
	$scope.auth=getAuth();
	this.init($scope);	
	
	//Grid,dropdown data loading
	loadGridData($scope.pagingOptions.pageSize,1);
	
	//CRUD operation
	$scope.saveItem=function(){	
		var record={};
		$scope.errors = {};
		$scope.nameError =false;
		if($scope.item==null || $scope.item=="" ){
            $scope.nameError = true;
            $scope.errors.nameMsg = 'Please enter country name.';
            return false;
        }
		if($scope.item.CountryName==null || $scope.item.CountryName=="" ){
            $scope.nameError = true;
            $scope.errors.nameMsg = 'Please enter country name.';
            return false;
        }
		angular.extend(record,$scope.item);
				//record.name=undefined;

		loadData('save',record).success(function(data){
			if(data.success){
				$.bootstrapGrowl('<h4>Success!</h4> <p>'+data.msg+'</p>', {
					type: 'success',
					delay: 2500,
					allow_dismiss: true
				});
			}else{
				$.bootstrapGrowl('<h4>Warning!</h4> <p>'+data.msg+'</p>', {
					type: 'warning',
					delay: 2500,
					allow_dismiss: true
				});
			}
			//toastr.success(data.msg);
			if(data.success){
				loadGridData($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage);
			}
			$scope.fgShowHide=true;			
			$scope.item=null;
		});
	};			
	$scope.editItem=function(row){	
		console.log(row);
		$scope.item=row;
		$scope.item.CountryName =row.CName;
		// $scope.item=row.entity;
		
		$scope.fgShowHide=false;				
	};
	$scope.deleteItem=function(row){
		if(confirm('Delete sure!')){
			var id = {'id':row};
			loadData('delete',id).success(function(data){
				loadGridData($scope.pagingOptions.pageSize,$scope.pagingOptions.currentPage);
		            $.bootstrapGrowl('<h4>Success!</h4> <p>Data removed successfully</p>', {
		                type: 'info',
		                delay: 2500,
		                allow_dismiss: true
		            });
			});
		}
	};
	$scope.changeItemStatus=function(row,status){
			var data = {'id':row,'status':status};
			loadData('changestatus',data).success(function(data){
				loadGridData($scope.pagingOptions.pageSize,$scope.pagingOptions.currentPage);
		            $.bootstrapGrowl('<h4>Success!</h4> <p>'+data.msg+'</p>', {
		                type: 'info',
		                delay: 2500,
		                allow_dismiss: true
		            });
			});
	};
	
	//pager events
	
	$scope.setPage = function(page){
console.log(page);
		$scope.pagingOptions.currentPage=page + 1;
	 	loadGridData($scope.pagingOptions.pageSize, $scope.pagingOptions.currentPage);
	}
	//search
	$scope.doSearch=function(){
		loadGridData($scope.pagingOptions.pageSize, 1);
	};
	
	//Utility functions
	function isSearch(){
		if(!$scope.search) return false;
		for(var prop in $scope.search){
			if($scope.search.hasOwnProperty(prop) && $scope.search[prop]) return true;
		}
		return false;
	}
	function loadGridData(pageSize, currentPage){
		var action=isSearch()?'get_page_where':'get_page', params={size:pageSize, pageno:(currentPage-1)*pageSize};
		
//		angular.extend( params, $scope.search);
		params['search']=$scope.search;
		loadData(action,params).success(function(res){
			$scope.list=res.data;
		    $scope.totalpaging=Math.ceil(res.total/$scope.pagingOptions.pageSize);
//    console.log($scope.totalpaging);

			$scope.totalItems=res.total
		});
	}
	function loadData(action,data){
		return $http({
			  method: 'POST',
			  url: BASE_URL+'Country_ctrl/'+action,
			  data: data,
			  headers: {'Content-Type': 'application/x-www-form-urlencoded'}			  
			});		
	}
	function getDate(source){		
		if(typeof source ==='string'){;
			var dt=source.split(' ')[0];
			return new Date(dt);
		}
		return source;
	}
}
 CountryCtrl.prototype.init=function($scope){
	$scope.search=null;
	$scope.item=null;
	$scope.list = null;
	$scope.fgShowHide=true;
	
	$scope.searchDialog=false;
	$scope.DepartmentList=null;	
	
	this.configureGrid($scope);	
	this.searchPopup($scope);

 };
CountryCtrl.prototype.configureGrid=function($scope){
	$scope.totalItems = 0;
    $scope.pagingOptions = {
        pageSizes: [10, 20, 30, 50, 100, 500, 1000],
        pageSize: 30,
        currentPage: 1
    };	
	

};
CountryCtrl.prototype.searchPopup=function($scope){
	$scope.showForm=function(){$scope.fgShowHide=false; $scope.country=null;};
	
	$scope.hideForm=function(){$scope.fgShowHide=true;};
	$scope.openSearchDialog=function(){		
		$scope.searchDialog=true;
	};
	$scope.closeSearchDialog=function(){		
		$scope.searchDialog=false;
	};	
	$scope.refreshSearch=function(){$scope.search=null;};
	
};