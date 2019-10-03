@extends('interfaces.index')

@section('contenu')
    <div class="container contact">
        <br><br><br>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ url('pdf_dl') }}" method="get" accept-charset="utf-8">
                    @csrf
                    <div class="contact-form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fname">First Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="comment">Comment:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="message" id="message"></textarea>
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br><br><br>
    </div>
@endsection
