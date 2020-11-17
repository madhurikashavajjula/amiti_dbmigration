<?php
	include_once 'config/database.php';
	include_once "model/db.php";
	include_once "check_reply.php";
	$emp_id=$_GET['emp_id'];
		//echo "patient_id".$patient_id;
		$query = "select * from tblbenefitslist WHERE Employee = $emp_id";
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count =='0'){
			$flag="add";
			$Benefit="";
			$Enrollment_Date="";
			$Withdrawal_Date="";
			$Employee_Contribution_1="";
			$Employee_Contribution_2="";
			$Dependents="";
			$Note="";
		}
		else{
			$flag="edit";
			$i = 1;
		while($result = $stmt->fetch(PDO::FETCH_ASSOC))
		{
		$Benefit=$result['Benefit'];
		$Enrollment_Date=$result['Enrollment_Date'];
		$Withdrawal_Date=$result['Withdrawal_Date'];
		$Employee_Contribution_1=$result['Employee_Contribution_1'];
		$Employee_Contribution_2=$result['Employee_Contribution_2'];
		$Dependents=$result['Dependents'];
		$Note=$result['Note'];
	
		}
		}
		
	
		
		
	
?>
<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Amiti | Benefits</title>
		<meta name="description" content="Headers datatables examples">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

		<!--end::Fonts -->

		<!--begin::Page Vendors Styles(used by this page) -->
		<link href="assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->
<?php
	include "page_sections/adminpanel_headlinks.php";
?>

	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="index.html">
					<img alt="Logo" src="../images/logo.png" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin:: Aside -->
					<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
						<div class="kt-aside__brand-logo">
							<a href="index.html">
								<img alt="Logo" src="../images/logo.png" />
							</a>
						</div>
						<div class="kt-aside__brand-tools">
							<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
											<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
											<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
										</g>
									</svg></span>
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
											<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
											<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
										</g>
									</svg></span>
							</button>

							<!--
			<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
			-->
						</div>
					</div>

					<!-- end:: Aside -->

<?php
	include "page_sections/adminpanel_sidebar_menu.php";
?>
				</div>

				<!-- end:: Aside -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<?php
	include "page_sections/adminpanel_header.php";
?>
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

<!-- begin:: Content Head -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-subheader__main">
								<h3 class="kt-subheader__title">Benefits</h3>

								<div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
									<input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
									<span class="kt-input-icon__icon kt-input-icon__icon--right">
										<span><i class="flaticon2-search-1"></i></span>
									</span>
								</div>
							</div>
							<div class="kt-subheader__toolbar">
								<div class="kt-subheader__wrapper">
									<a href="#" class="btn kt-subheader__btn-secondary">Home</a><i class="fa fa-angle-right" aria-hidden="true"></i>
									<a href="#" class="btn kt-subheader__btn-secondary">My Benefits</a><i class="fa fa-angle-right" aria-hidden="true"></i>


								</div>
							</div>
						</div>

						<!-- end:: Content Head -->

						<!-- begin:: Page Content -->
						<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
							<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head kt-portlet__head--lg">
									<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
										<h3 class="kt-portlet__head-title">
											My Benefits
										</h3>
									</div>
									
								</div>
								<div  tabindex="-1"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div  role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit/View Benefits</h5>
			</div>
		<form action="edit_Benefits_db.php" id="form_profile_edit" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				<div class="row">
				<div class="col-md-8 form-group">
                                    <label>Benefits</label>
                                    <select class="form-control" name="benefits" id="benefits" required>
                                    <option value="<?php echo $Benefit ?>" selected><?php echo $Benefit ?></option>
<?php
$query = "select * from tblbenefits";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$i = 1;
	
	while($result = $stmt->fetch(PDO::FETCH_ASSOC))
	{
            print '<option value="'.$result['Benefit'].'">'.$result['Benefit'].'</option>';
        }
 ?>
                                    
                                    </select>
                                </div>
								<div class="col-md-6">
						<div class="form-group">
							<label for="location" class="form-control-label">Enrollment Date:</label>
							<input type="date" class="form-control" value="<?php echo $Enrollment_Date ?>" name="enroll_date" id="enroll_date" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="location" class="form-control-label">Withdrawl Date:</label>
							<input type="date" class="form-control" value="<?php echo $Withdrawal_Date ?>" name="withdraw_date" id="withdraw_date" >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="project-name" class="form-control-label">Employee Contribution:</label>
							<input type="number" class="form-control" value="<?php echo $Employee_Contribution_1 ?>" id="Employee_Contribution_1"  name="Employee_Contribution_1" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="location" class="form-control-label">Employeer Contribution:</label>
							<input type="number" class="form-control" value="<?php echo $Employee_Contribution_2 ?>" name="Employee_Contribution_2" id="Employee_Contribution_2" required>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label for="project-name" class="form-control-label">Dependents:</label>
							<input type="text" class="form-control" value="<?php echo $Dependents ?>" name="dependents" id="dependents" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="project-name" class="form-control-label">Note:</label>
							<textarea class="form-control"  name="note" id="note" required><?php echo $Note?></textarea>
						</div>
					</div>
				
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" style="position: relative;right: 470px;" id="benefits_edit" class="btn btn-primary">Save</button>
				<button type="submit" style="position: relative;right: 470px;" id="print" class="btn btn-primary">Print</button>

				<input type="hidden" id="emp_id" name="emp_id" value="<?php echo $emp_id ?>">
				<input type="hidden" id="flag" name="flag" value="<?php echo $flag ?>">
				
			</div>
		</form>

		</div>
	</div>
</div>




							</div>
						</div>

						<!-- end:: End Content -->
					</div>

					<!-- begin:: Footer -->
<?php
	include "page_sections/adminpanel_footer.php";
?>

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->



		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->





<?php
	include "page_sections/adminpanel_bottomscripts.php";

	
?>

		<!--begin::Page Vendors(used by this page) -->
		<script src="assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>

		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="assets/app/custom/general/crud/datatables/basic/paginations.js" type="text/javascript"></script>

		<!--end::Page Scripts -->


	</body>

	<!-- end::Body -->
</html>











