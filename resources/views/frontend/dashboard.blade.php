@extends('frontend.layout')
@section('title', 'Dashboard')
@section('content')
<main class="content">
  <div class="col-lg-12">
    <div class="tab">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#tab-1" data-toggle="tab" role="tab">Announcements</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-2" data-toggle="tab" role="tab">My Alerts</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-3" data-toggle="tab" role="tab">My Tasks</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab-1" role="tabpanel">
          <div class="row">
            <div class="col-sm-1 text-center">
              <h6>Date</h6>
              <ul class="customlist">
                <li>2/3/2021</li>
              </ul>
            </div>
            <div class="col-sm-11">
              <h6>Message</h6>
              <div class="text-area">
                <p class="text-center">PECOS DOCTORS UPDATE AVAILABLE - BRIGHTREE</p>
                <p>Brightree has updated your Doctor Table with CMS's latest list of PECOS registered doctors. CMS’s updates include removed 649 from the prior PECOS list and 1866 doctors added.</p>
                <p>SPECIAL NOTE: As per previous updates, Brightree Development is uploading 4 Reports to your Home -> My Files -> Inbox - these reports are for your reference should there be any question about a Doctor that was previously checked/unchecked.</p>
                <p>The first report will contain a list of Doctors that were previously checked with invalid NPI numbers that have now been unchecked as a result of CMS's latest update file.</p>
                <p>The second Report will contain a list of Doctors that were previously checked with NPI numbers not in the PECOS list that have now been unchecked as a result of CMS's latest update file.</p>
                <p>The third Report will contain a list of Doctors that were previously unchecked with NPI numbers that are in the PECOS list and that have now been checked as a result of CMS's latest update file.</p>
                <p>The fourth Report will contain an informational list of Doctors that were mismatched based on the first letter of the first name and the first four letters of the last name as specified by Medicare requirements. NOTE: This report is informational only and no changes will be made to the doctor file.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tab-2" role="tabpanel">
          <h4 class="tab-title">Another one</h4>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor tellus eget condimentum rhoncus. Aenean massa. Cum sociis natoque
            penatibus et magnis neque dis parturient montes, nascetur ridiculus mus.</p>
          <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
            eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
        </div>
        <div class="tab-pane" id="tab-3" role="tabpanel">
          <h4 class="tab-title">One more</h4>
          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor tellus eget condimentum rhoncus. Aenean massa. Cum sociis natoque
            penatibus et magnis neque dis parturient montes, nascetur ridiculus mus.</p>
          <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
            eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection