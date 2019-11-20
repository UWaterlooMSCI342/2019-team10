@extends('layout.master')

@section('title', 'Page Title')

@section('content')


<body style="background-image:url(https://wallpaperaccess.com/full/117898.jpg)"> 
<div style="margin: 20px; display: inline-block; padding: 20px; height: 90px; width: 30%;
 text-align: center; background-color: #3D3131; border: 10px solid black;">
    <a href="{{url('/api/spells')}}"><h1 align = "center"><font size = "5"; color = #D30909> Dungeons & Dragons</font></h1></a>
</div>

<script>
    var checker = 0 
    $.fn.selectpicker.Constructor.BootstrapVersion = '4';
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked")== true){
                checker = checker + 1; 
            }
            else if($(this).prop("checked")==false){
                checker = checker -1; 
            } 
            if(checker > 0){
                $("#addToSpellbook").attr("disabled", false);
            }else{
                $("#addToSpellbook").attr("disabled", true);
            }   
        });
    });
</script>

<script>
    function searchName() {
        var input = document.getElementById("searchbar");
        var filter = input.value.toUpperCase();
        var table = document.getElementById("spellTable");
        var tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("a")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
</script>
<div style = "padding: 16px; width:fit-content; height: fit-content; background-color: #212429">

    <div class="btn-group" style = "border-right:2px solid #616161; padding-right: 16px; margin-left:8px; margin-right:16px; color:white;" >
        <div >
            <label style = "display:block; color:white; font-size: 16px;"><b>Search Spells</b></label>
            <input id="searchbar" onkeyup="searchName()" type="text" name="search" placeholder="Search by Name"> 
        </div>
    </div>

    <div class="btn-group">                                         
        <a href="{{url('/api/add')}}" class="btn btn-primary">Add Spell</a>
    </div>

    <div class="btn-group"> 
        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#Modal">
            Advanced Filter
        </button>
    </div>

    <div class="btn-group">                                         
        <a href="{{url('/api/spellbooks')}}" class="btn btn-danger">View Spellbooks</a>
    </div>

</div>

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Advanced Filter Search</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action = "{{url('/api/spell/filter/multifilter')}}" method = "POST">	
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="levelFilterSelect"><b>Level:</b></break></label>
                            <select id="levelFilterSelect" name = "level[]" class="selectpicker form-control" multiple>
                                @foreach($levels as $level) 
                                    <option value = "{{($level->level)}}">{{($level->level)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="classFilterSelect"><b>Classes:</b></label>
                            <select id="classFilterSelect" name = "class[]" class="selectpicker form-control" multiple>
                                @foreach($classes as $class) 
                                    <option value = "{{($class->class_id)}}">{{($class->class_name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <input id="classFilterLogic" name="classLogic" type="checkbox" data-toggle="toggle" data-on="And" data-off="Or" data-onstyle="success" data-offstyle="danger">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="schoolFilterSelect"><b>School:</b></label>
                        <select id="schoolFilterSelect" name = "school[]" class="selectpicker form-control" multiple>
                            @foreach($schools as $school) 
                                <option value = "{{($school->school)}}">{{($school->school)}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ritualFilterSelect"><b>Ritual:</b></label>
                        <select id="ritualFilterSelect" name = "ritual" class="selectpicker form-control">
                            <option selected value = "Any"> -- Any -- </option>
                            @foreach($rituals as $ritual) 
                                <option value = "{{($ritual->ritual)}}">{{($ritual->ritual)}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="concentrationFilterSelect"><b>Concentration:</b></label>
                        <select id="concentrationFilterSelect" name = "concentration" class="selectpicker form-control">
                            <option selected value = "Any"> -- Any -- </option>
                            @foreach($concentrations as $concentration) 
                                <option value = "{{($concentration->concentration)}}">{{($concentration->concentration)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" value="Submit" class="btn btn-success">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" href="{{url('/api/spells')}}">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br/>

<form action="{{url('/api/spellbook/add')}}" method="POST">
    <div class="btn-group wrapper" style="text-align:right, position: absolute;">                                         
        <button type = "button" href = "#" style = "color: white;" id = "addToSpellbook" class="btn btn-success btn-large" data-toggle="modal" data-target="#spellbookModal" value = "addToSpell" disabled = "disabled"> Add to Spellbook </button>
    </div>

    <div style="height:400px;overflow:auto;">
        <table id = "spellTable" class="table table-striped table-dark w-auto" style = "font-size: 14px">
            <thead>
                <tr>
                    <th scope = "col">Level</th>
                    <th scope = "col">Name</th>
                    <th scope = "col">Class</th>
                    <th scope = "col">Ritual</th>
                    <th scope = "col">Concentration</th>
                    <th scope = "col">School</th>
                    <th scope = "col">Delete</th>
                    <th scope = "col">Add to Spellbook</th>

                </tr>
            </thead>
            <tbody>

                @foreach($spells as $spell)
                    <tr>
                        <td>{{$spell -> level}}</td>
                        <td class = "Name"><a href="{{url('/api/spell/detail/' . $spell -> spell_id)}}">{{$spell -> name}}</a></td>
                        <td>{{$spell -> formattedClasses()}}</td>
                        <td>{{$spell -> ritual}}</td>
                        <td>{{$spell -> concentration}}</td>
                        <td>{{$spell -> school}}</td>

                        <td>
                        <a href="{{url('/api/spell/' . $spell -> spell_id)}}" onclick="return confirm('Are you sure you want to delete this spell?');" class = "btn btn-primary" id = "delete_button">Delete</a>                        </td>


                        
                        <td style="text-align:center;">
                            <div class="form-check" >
                                <input onclick=getValue() type="checkbox" name="spells[]" class="checks" value="{{$spell->spell_id}}" style="width:20px;height:20px;">
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include("spellbook", ["spellbook" => $spellbooks])
</form>
</body>
@endsection