import relativeDate from 'angular-relative-date';
var xapp = angular.module('xapp',['relativeDate']);




xapp.controller('xctrl',['$scope','$http','$filter',function($scope,$http,$filter){
   $scope.tareq = "Tareq Hossain";

   loadunreadNotifications();

    this.$onInit=function () {

        console.log("default workig");

        //get data from pusher
        window.Echo.private('App.User.'+1)
            .notification((res) => {

            if(res){
                loadunreadNotifications();
            }
    });

    }

   function loadunreadNotifications() {
       $http.get('/api/notifications').then(function(res){

           if(res.statusText =="OK"){

               $scope.unreadNotifications = res.data;
                 var  length = $filter('filter')($scope.unreadNotifications, {read_at: null});
               $("#count").html(length.length);

               $scope.loopNotification($scope.unreadNotifications);
           }

       });
   }

       $("#markAsRead").click(function () {

           $http.get('/api/markasread').then(function(res){

             if(res.statusText == "OK") {
                 loadunreadNotifications();
             }


           });
       })
/*

*/






   $scope.loopNotification = function(notifications)
   {
       var mydata ="";
      $.each(notifications,function (keys,values) {
            var data = JSON.parse(values.data);

            mydata += '                        <li>\n' +
                '                            <a href="/admin/leave/'+data[0].leave_id+'/show"  >\n' +
                '                                <span class="image"><img src="/images/img.jpg" alt="Profile Image" /></span>\n' +
                '                                <span>\n' +
                '                          <span>'+data[0].emp_name+'</span>\n' +
                '                          <span class="time"></span>\n' +
                '                        </span>\n' +
                '                                <span class="message">\n' +
                '                          '+data[0].subject+'...\n' +
                '                        </span>\n' +
                '                            </a>\n' +
                '                        </li>'

      });

      $("#notificationDiv").html(mydata);

   }


}]);