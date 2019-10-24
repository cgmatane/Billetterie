@extends('interfaces.index')

@section('contenu')
        <div class="container-fluid" style="background: url(/img/fond.jpg) 0 0 fixed no-repeat;background-size: 100% 100%;">
            <div class="text-center row justify-content-center" style="margin-bottom: 0;">
                <div class="col-sm-6 col-xs-8 shadow-lg rounded-lg  mt-6" style="background-color: midnightblue">
                    @component('interfaces.accueil.components.titre_principal')
                        {{ $choix_date_titre }}
                    @endcomponent
                </div>
            </div>
            <div class="text-center row justify-content-center">
                <div class="bg-white col-sm-6 col-xs-8 bg-light pb-5 shadow-lg rounded-lg">
                    <div id="v-cal">
                        <div class="vcal-header">
                            <button class="vcal-btn" data-calendar-toggle="previous">
                                <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                                </svg>
                            </button>

                            <div class="vcal-header__label" data-calendar-label="month">
                                March 2017
                            </div>


                            <button class="vcal-btn" data-calendar-toggle="next">
                                <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="vcal-week">
                            <span>Mon</span>
                            <span>Tue</span>
                            <span>Wed</span>
                            <span>Thu</span>
                            <span>Fri</span>
                            <span>Sat</span>
                            <span>Sun</span>
                        </div>
                        <div class="vcal-body" data-calendar-area="month"></div>
                    </div>

                    <p class="demo-picked">
                        Date picked:
                        <span data-calendar-label="picked"></span>
                    </p>
                    <script>
                        var vanillaCalendar={
                            month:document.querySelectorAll('[data-calendar-area="month"]')[0],
                            next:document.querySelectorAll('[data-calendar-toggle="next"]')[0],
                            previous:document.querySelectorAll('[data-calendar-toggle="previous"]')[0],
                            label:document.querySelectorAll('[data-calendar-label="month"]')[0],
                            activeDates:null,date:new Date,todaysDate:new Date,
                            init:function(t){
                                this.options=t,this.date.setDate(1),this.createMonth(),this.createListeners()
                            },
                            createListeners:function()
                            {
                                var t=this;this.next.addEventListener("click",
                                function(){
                                    t.clearCalendar();var e=t.date.getMonth()+1;t.date.setMonth(e),t.createMonth()
                                }),
                                this.previous.addEventListener("click",function(){t.clearCalendar();
                                var e=t.date.getMonth()-1;t.date.setMonth(e),t.createMonth()
                                })
                            },
                            createDay:function(t,e,a)
                            {
                                var n=document.createElement("div"),
                                    s=document.createElement("span");
                                s.innerHTML=t,n.className="vcal-date",
                                    n.setAttribute("data-calendar-date",this.date),
                                1===t&&(n.style.marginLeft=0===e?6*14.28+"%":14.28*(e-1)+"%"),
                                    this.options.disablePastDays&&this.date.getTime()<=this.todaysDate.getTime()-1?n.classList.add("vcal-date--disabled"):(n.classList.add("vcal-date--active"),
                                        n.setAttribute("data-calendar-status","active")),
                                this.date.toString()===this.todaysDate.toString()&&n.classList.add("vcal-date--today"),
                                    n.appendChild(s),
                                    this.month.appendChild(n)},
                            dateClicked:function()
                            {
                                var t=this;this.activeDates=document.querySelectorAll('[data-calendar-status="active"]');
                                for(var e=0;e<this.activeDates.length;e++)
                                    this.activeDates[e].addEventListener("click",function(e){document.querySelectorAll('[data-calendar-label="picked"]')[0].innerHTML=this.dataset.calendarDate,
                                        t.removeActiveClass(),
                                        this.classList.add("vcal-date--selected")})},
                            createMonth:function(){
                                for(var t=this.date.getMonth();this.date.getMonth()===t;)
                                    this.createDay(this.date.getDate(),this.date.getDay(),this.date.getFullYear()),
                                        this.date.setDate(this.date.getDate()+1);this.date.setDate(1),this.date.setMonth(this.date.getMonth()-1),
                                    this.label.innerHTML=this.monthsAsString(this.date.getMonth())+" "+this.date.getFullYear(),
                                    this.dateClicked()},monthsAsString:function(t){
                                return["January","Febuary","March","April","May","June","July","August","September","October","November","December"][t]},
                            clearCalendar:function(){
                                vanillaCalendar.month.innerHTML=""
                            },
                            removeActiveClass:function(){
                                for(var t=0;t<this.activeDates.length;t++)this.activeDates[t].classList.remove("vcal-date--selected")
                            }
                        };
                        window.addEventListener('load', function () {
                            vanillaCalendar.init({
                                disablePastDays: true
                            });
                        })
                    </script>
                </div>
            </div>


            <div class="row text-center justify-content-around">
                @component('interfaces.choix_date.components.bouton_retour_accueil')
                    @slot('route')
                        {{ route('index') }}
                    @endslot
                    {{ $global_retour_accueil }}
                @endcomponent
            </div>
        </div>

@endsection
