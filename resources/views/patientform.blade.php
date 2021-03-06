<!DOCTYPE HTML>

<html>

        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/main.css')}}">


@extends('layout')
        @section('content')
	<!-- نموذج تسجيل البيانات -->
		<section id="container">
			<div class="inner">
				<div class="align-center">
					<h2 class="align-center" style="color:#6CC091;"><em>تسجيل البيانات المريض</em></h2>

					<form action="patientstore" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <fieldset>
					<div class="field half name">
					<label for="name" class="align-right"><em>اسم المريض</em></label>
					<input name="p_name" id="p_name" type="text" class="align-right" placeholder="الاسم">
					</div><br>


                     <div class="field half name">
                     <label for="name" class="align-right"><em>الحالة المرضية</em></label>
                     <input name="p_case"  id="p_case" type="text" class="align-right" placeholder="الحالة المرضية">
                     </div><br>

                        <div class="field half blood type ">
                            <label for="bloodtype" class="align-right"><em> فصيله  الدم</em></label>
                            <select name="p_b_id" id="p_b_id">
                                @foreach(App\bloodType ::get() as $bloodType)
                                    <option value='{{$bloodType->b_id}} '>   {{$bloodType->blood_type}} </option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="field half hospital">
                            <label for="hospital" class="align-right"><em>اسم المستشفي</em></label>
                            <input name="hospital" type="text"class="align-right" placeholder="اسم المستشفي">
                        </div><br>

					<div class="field half phone number">
					<label for="phonenumber" class="align-right"><em>رقم التليفون</em></label>
					<input name="p_mobile"   type="text"class="align-right" placeholder="رقم التليفون">
					</div><br>




					<div class="field half country ">
					<label for=" country" class="align-right"><em>المحافظه</em></label>
					<select name="p_governorate" id="p_governorate">
                        @foreach(App\governorate ::get() as $governorate)
                            <option value='{{$governorate->id}} '>   {{$governorate->governorate_name}} </option>
                        @endforeach
					</select>


						<label for="city" class="align-right"><em>المدينه</em></label>
					<select name="p_city" id="p_city">
{{--                        @foreach(App\citie ::get() as $city)--}}
{{--                            <option value='{{$city->c_id}} '>   {{$city->city_name}} </option>--}}
{{--                        @endforeach--}}
					</select>

					</div><br>

						<button type="submit" style="...">تسجيل الطلب </button>
                        </fieldset>

				</form>

                    <div>
                        <br>
                        <a href="/search" ><button style="font-size:25px"> بيانات المتبرعين</button></a>

                    </div>
                    <br>
				</div>
			</div>
        </section>

    <script>

        $(document).ready(function(){

            $('#p_governorate').on('change',function(){
                var gov_id =$(this).val();

                if(gov_id){

                    $.ajax({
                        url:'/fetch',
                        type:'post',
                        data:{gov_id:gov_id},
                        success:function (data) {
                            $('#p_city').empty();
                            console.log(data)
                            $.each(data ,function (index,city) {
                                var op = $("<option value='"+city.c_id+"'></option>");

                                op.append("<option '>"+city.city_name+"</option>")

                                $('#p_city').append(op);
                            });

                        }
                    })

                }
                else {$('#p_city').html('<option>اختر المحافظة اولا </option>') }

            });

            $.ajaxSetup({ headers:{'X-CSRF-TOKEN':'{!! csrf_token() !!}'}})
        })
    </script>

    </body>


@endsection
		<!-- Scripts -->
        <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/skel.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/until.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>


</html>
