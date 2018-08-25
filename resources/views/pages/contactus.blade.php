@extends('layouts.indextemplate')
@section('content')
<div class="col-lg-3 col-md-3"> </div>
<div class="col-lg-6 col-md-6" >
    <div class="contact-page-div">
        <div class="contact-error">
           @if ($errors->any())
             <div class ="alert alert-warning">
            <ul class="info">
                @foreach ($errors->all() as $error)
                    <li class="alert errors">{{ $error }}</li>
                @endforeach
            </ul>
              </div>
        @endif                  
        </div>
                                        <div class=" col-md-9 col-sm-9 contact-div center-block">
                                   
                               <!-- <div class="panel panel-default">-->
                                
                                <form class="form-light mt-20" id='post-ajax-contactus' action="{{ url('send-enquiry') }}" role="form" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                               <br/>
                                <input type="text" class="form-control" placeholder="Your name" name='name' required>
                            </div>
                                
                                    <div class="form-group">
                                       
                                        <input type="email" class="form-control" placeholder="Your email address" name='email' required>
                                    </div>
                               
        
                            <div class="form-group">
                               
                                <input type="text" class="form-control" placeholder="The Subject of your message" name='subject' required>
                            </div>
                            <div class="form-group">
                               
                                <textarea class="form-control" id="message" placeholder="Write your message here..." style="height:100px;" name="message" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                     <button name='send' type="submit" class="btn btn-primary">
                                        <span>Send message</span>
                                    </button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                </div>                              
                                </div>
                             </form>
                    
                    <br/>
                    <address class="email-phone">
                    You can also reach us through<br/>
                    Email: askbido@gmail.com<br/>
                    Phone no: 07065119492
                    </address>
                    </div>
                     </div>
                </div>
                
    </div>
</div>
<div class="col-lg-3 col-md-3"> </div>
@endsection