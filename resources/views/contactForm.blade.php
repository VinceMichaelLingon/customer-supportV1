<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name ="viewport" content="width=device-width, initial-scale=1.0">
        <title>Customer Support</title>
        <!-- <script src="{{!! asset('js/app.js') }}" defer></script> -->
    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet" type="text/css">
</head>
<body>
   <div class="container">
       <div class="row">
           <div class="col-md-6 offset-md-3 mt-5">
               <h4>Contact Us</h4> <hr>

               <form action="{{ route('send.email')}}" method="POST">
               @csrf
               @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                   <div class="form-group">
                       <label for="">Name</label>
                       <input type="text" class="form-control" name="name" placeholder="Enter Your name" value="{{old('name') }}">
                       @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                   </div>
                   <div class="form-group">
                       <label for="">Email</label>
                       <input type="text" class="form-control" name="email" placeholder="Enter Your Email" value="{{old('name') }}">
                       @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                   </div>
                   <div class="form-group">
                       <label for="">Subject</label>
                       <input type="text" class="form-control" name="subject" placeholder="Enter Your Subject" value="{{old('name') }}">
                       @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                   </div>
                   <div class="form-group">
                       <label for="">Message</label>
                       <textarea name="message" class="form-control" cols="4" rows="4"> {{old('name') }}</textarea>
                       @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                   </div>

                   <button class="btn btn-primary">Send</button>
               </form>
           </div>
       </div>
   </div>
</body>
</html>

