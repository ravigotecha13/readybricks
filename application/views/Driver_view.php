<script src="static/appScript/DriverCtrl.js"></script>
<script>function getAuth(){ <?php echo $fx ?>;}</script>
<?php if ($read): ?>
<div ng-controller="DriverCtrl">
<div class="element-wrapper" ng-show="fgShowHide">
                <h6 class="element-header">
                  Manage Driver
                </h6>
                <div class="element-box">
                  <div class="form-desc">
                        <button type="button" ng-show="auth.insert" ng-click="showForm()" class="btn btn-success" ><i class="icon-plus icon-white"></i><b> Add </b></button>

                  </div>
                  <div class="table-responsive">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length"><label>Show <select name="dataTable1_length" class="form-control form-control-sm rounded bright" style="width:75px"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries </label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="dataTable1_filter" class="dataTables_filter float-right"><label>Search:
                                        <input type="search" ng-model="search" class="form-control form-control-sm rounded bright" placeholder="" ng-change="doSearch()"></label>
                                </div>
                            </div>
                        </div>
                        <table  width="100%" class="table table-lightborder">
                        <thead>
                            <tr>
                                <th>Transporter Name</th> <th>Name</th><th>Phone No</th><th>License No.</th> 
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Transporter Name</th> <th>Name</th><th>Phone No</th><th>License No.</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr ng-repeat="item in list">
                                <td>{{item.Name}}</td>
                                <td>{{item.Name}}</td>
                                <td>{{item.PhoneNo}}</td>
                                <td>gj0310202020</td>

                                <td class="text-center">
                                    <button class="mb-2 btn btn-outline-info " ng-click="editItem(item)" type="button">  <i class="os-icon os-icon-ui-49" style="margin-top: -3px;"></i></button>
                                    <button class="ml-0 mb-2 btn btn-outline-danger " ng-click="deleteItem(item)" type="button"> <i class="os-icon os-icon-ui-15" style="margin-top: -3px;"></i></button>
                                </td>
                            </tr>
                            <tr ng-show="list.length ==0"><td colspan="10" class="text-center">Customer Not found</td></tr>

                            </tbody></table>
                  </div>

                            <div class="row"><div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="dataTable1_info" role="status" aria-live="polite">Showing {{pagingOptions.currentPage}} to {{totalpaging}} of {{totalItems}} entries</div></div>
                                    <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers float-right"><ul class="pagination"><li class="paginate_button page-item previous" ng-class="{'disabled': pagingOptions.currentPage == 1}"><a href="javascript:void(0)" ng-click="setPage(pagingOptions.currentPage - 1)" class="page-link">Previous</a></li><li ng-repeat="pages in arrayTwo(pagingOptions.currentPage,totalpaging) track by $index" ng-class="{'active': pages == pagingOptions.currentPage}"  class="paginate_button page-item "><a href="javascript:void(0)" ng-click="setPage(pages)" class="page-link" ng-if="pages !='...'">{{pages}}</a><span href="javascript:void(0)"  data-paging-options="pages" ng-if="pages =='...'" class="page-link">{{pages}}</span></li><li class="paginate_button page-item next" ng-class="{disabled: pagingOptions.currentPage == totalpaging || totalItems == 0}"><a href="javascript:void(0);" ng-click="setPage(pagingOptions.currentPage + 1)" class="page-link">Next</a></li></ul></div></div>
                                </div>

                </div>

              </div>












<div ng-show="!fgShowHide" style="display:none">
    <div class="element-wrapper">
                <h6 class="element-header">{{datatype}} Driver</h6>
                <div class="element-box"><div class="form-desc"><button type="button"  ng-click="hideForm()" class="btn btn-success" ><i class="icon-plus icon-white"></i><b> Back </b></button></div>
    <!-- END Form Elements Title -->
    <form action="#"  name="myForm" method="post" enctype="multipart/form-data"  onsubmit="return false;">
        <div class="form-group" ng-class="countryError ? 'has-error':''">
            <label>Select Transporter</label>
            <select name="transporter" id="transporter" ng-model="item.Transporter"  class="form-control" ng-focus="hideErrorMsg('transporterError')">
                <option selected>Select Transporter</option>
            </select>
            <span ng-show="transporterError" ng-bind="errors.transporterMsg" class="help-block form-text text-muted form-control-feedback"></span>
        </div>

        <div class="form-group" ng-class="firstnameError ? 'has-error':''">
            <label>First Name</label>
            <input type="text" name="firstname" id="firstname" ng-model="item.FirstName"  class="form-control" placeholder="First Name" ng-focus="hideErrorMsg('firstnameError')">
            <span ng-show="firstnameError" ng-bind="errors.firstnameMsg" class="help-block"></span>
        </div>
        <div class="form-group" ng-class="lastnameError ? 'has-error':''">
            <label>Last Name</label>
            <input type="text" name="lastname" id="lastname" ng-model="item.LastName"  class="form-control" placeholder="Last Name" ng-focus="hideErrorMsg('lastnameError')">
            <span ng-show="lastnameError" ng-bind="errors.lastnameMsg" class="help-block"></span>
        </div>
        <div class="form-group" ng-class="phonenoError ? 'has-error':''">
            <label>Phone No.</label>
            <input type="text" name="phoneno" id="phoneno" ng-model="item.PhoneNo"  class="form-control" placeholder="Phone Number" ng-focus="hideErrorMsg('phonenoError')">
            <span ng-show="phonenoError" ng-bind="errors.phonenoMsg" class="help-block form-text text-muted form-control-feedback"></span>
        </div>
        <div class="form-group" ng-class="passwordError ? 'has-error':''">
            <label>Password</label>
            <input type="text" name="password" id="password" ng-model="item.Password"  class="form-control" placeholder="Password" ng-focus="hideErrorMsg('passwordError')">
            <span ng-show="passwordError" ng-bind="errors.passwordMsg" class="help-block form-text text-muted form-control-feedback"></span>
        </div>
        <div class="form-group" ng-class="addressError ? 'has-error':''">
            <label>Address</label>
            <textarea name="address" id="address" ng-model="item.Address"  class="form-control" placeholder="Address" ng-focus="hideErrorMsg('addressError')" rows="5"></textarea>
            <span ng-show="addressError" ng-bind="errors.addressMsg" class="help-block form-text text-muted form-control-feedback"></span>
        </div>
        <div class="form-group" ng-class="dlicenceError ? 'has-error':''">
            <label>Driver Licence No.</label>
            <input type="text" name="dlicence" id="dlicence" ng-model="item.DLicence"  class="form-control" placeholder="Driver Licence No." ng-focus="hideErrorMsg('dlicenceError')">
            <span ng-show="dlicenceError" ng-bind="errors.dlicenceMsg" class="help-block form-text text-muted form-control-feedback"></span>
        </div>
        <div class="form-group" ng-class="dlicenceimageError ? 'has-error':''">
            <label>Driver Licence Image</label>
            <br/>
            <input type="file" name="dlicenceimage" id="dlicenceimage" ng-model="item.DLicenceImage"   placeholder="Driver Licence No." ng-focus="hideErrorMsg('dlicenceimageError')">
            <span ng-show="dlicenceimageError" ng-bind="errors.dlicenceimageMsg" class="help-block form-text text-muted form-control-feedback"></span>
        </div>
        <div class="form-group form-actions">
            <div class="col-md-9 col-md-offset-3">
                <button   ng-click="saveItem()"  class="btn btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                <button class="btn btn-warning cancel" ng-click="hideForm()"><i class="icon-close icon-white"></i>Cancel</button>
            </div>
        </div>
    </form>
                                  
</div>


</div>
<?php else: ?>
<p> Not permitted</p>
<?php endif; ?>
