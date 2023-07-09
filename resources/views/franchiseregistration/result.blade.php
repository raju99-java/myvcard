<div class="row number-of-people mt-5">
    <div class="col-sm-12">
        <div class="how-many text-center">
            <h1 class="number">Number of people <span class="people">{{$total}}</span></h1>
        </div>
        <center>
            <div style="overflow-x:auto;">  
                <table class="table table-bordered">
                    <thead class="grey lighten-2">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Url</th>
                        </tr>
                    </thead>
                    <tbody>
                     @forelse($users as $user)
                    	<tr>
                            <td>{{$user->name}}</td>
                            <td>{{Route('card',['user_name'=>$user->user_name])}}</td>
                        </tr>
                     @empty
                       No User Registered
                     @endforelse
                        
                      
                    </tbody>
                </table>
            </div>
        </center>
    </div>
</div>