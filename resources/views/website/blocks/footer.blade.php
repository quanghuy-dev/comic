<?php
    use App\Models\Genres;
    $categories = Genres::latest()->limit(8)->get();
?>
<footer class="footer" style="margin-top: auto">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 copyright" itemscope itemtype="http://schema.org/Organization">
                <p style="padding-top: 25px">
                    Copyright © 2021 ComicBuddy
                </p>
            </div>
            <div class="col-sm-8">
                <div class='Module Module-55'>
                    <div class='ModuleContent'>
                        <div class="link-footer">
                            <h4>Genres</h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li>
                                        <a target="_self" href="{{route('genre_detail', $category->slug)}}">{{$category->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>