@extends('admin.master')
@section('title')
  Dashboard
@endsection 
@section('main-content')
<div class="row">
  <div class="col s12">
      <div class="all-item">
          <div class="row">
            <div class="col s3">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col s3"><span class="bg-icon"><i class="fa fa-users"></i></span></div>
                            <div class="col s9">
                              <div class="details">
                                <p>all user</p> 
                                <h4>{{ $user->count('id') }}</h4> 
                              </div>
                            </div>
                        </div>
                        <div class="card-content">
                          <a href="">
                            <i class="fa fa-share-square fa-lg"></i>
                            view
                          </a>
                        </div>

                    </div>
                </div>
            </div> 
      </div> 
  </div>
</div> 
@endsection
 