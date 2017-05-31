
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>NAME</th>
                    <th>PRICE</th>
                    <th>USAGE</th>
                    <th>TYPE</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($ingredients as $ingredient)
                  <tr>
                    <td>{{ $ingredient->name }}</td>
                    <td>RM {{ $ingredient->price }}</td>
                    <td>{{ $ingredient->usage }}</td>

                    <td>
                      <div class="stack pink">
                        @if($ingredient->type == "material")
                          <i class="em em-watermelon"></i> Ingredient
                        @elseif($ingredient->type == "labor")
                          <i class="em em-construction_worker"></i> Labor
                        @elseif($ingredient->type == "production")
                          <i class="em em-tractor"></i> Production
                        @elseif($ingredient->type == "nonproduction")
                          <i class="em em-office"></i> Non-Production
                        @else
                          <i class="em em-no_entry_sign"></i> Undefined
                        @endif 
                      </div>
                    </td>

                  </tr>
                  @endforeach
                  </tr>
                </tbody>
              </table>