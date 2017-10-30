var app = angular.module("mainApp", []);

app.controller('ASSController', function ($scope) {
  $scope.EmpModel = {
    Id: 0,
    Salary: 0,
    Name: '',
  };

  $scope.EmpList = [];
  $scope.AddData = function () {
    var _emp = {
      Id: $scope.EmpList.length + 1,
      Name: $scope.EmpModel.Name,
      Salary: $scope.EmpModel.Salary
    };
    $scope.EmpList.push(_emp);
    ClearModel();
  }

  function ClearModel() {
    $scope.EmpModel.Id = 0;
    $scope.EmpModel.Name = '';
    $scope.EmpModel.Salary = '';
  }
  $scope.DeleteData = function (emp) {
    var _index = $scope.EmpList.indexOf(emp);
    $scope.EmpList.splice(_index, 1);
  }
  $scope.BindSelectedData = function (emp) {
    $scope.EmpModel.Id = emp.Id;
    $scope.EmpModel.Name = emp.Name;
    $scope.EmpModel.Salary = emp.Salary;
    $scope.showme = true;
    $scope.showit = true;
  }
  $scope.hidshow = function (){
    $scope.showme = false;
    $scope.showit = false;
  }
  $scope.UpdateData = function () {
    $.grep($scope.EmpList, function (e) {
      if (e.Id == $scope.EmpModel.Id) {
        e.Name = $scope.EmpModel.Name;
        e.Salary = $scope.EmpModel.Salary;
      }
    });
    ClearModel();
  }
});
