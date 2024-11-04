@auth
    <span x-data="{like : {{$like}}, id:{{$id}} }">
        <i x-show="like != 0" @click="like = handleClick(like, id)" class="bi bi-heart-fill"></i>
        <i x-show="like == 0" @click="like = handleClick(like, id)" class="bi bi-heart"></i>
    </span>
@endauth

@guest
<a data-bs-toggle="modal" data-bs-target="#loginAlert"><i class="bi bi-heart"></i></a>
@endguest

@pushOnce('scripts')
<script>
    function handleClick(like, id) {
        axios.post('update-bookmark', {'id':id,'like':!like});
        return !like;
    }
</script>
@endPushOnce