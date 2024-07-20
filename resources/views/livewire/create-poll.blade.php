<div>
    <form>
      <label>Poll Title</label>
  
      <input type="text" wire:model.live.debounce.500ms="title">
  
      Current title: {{ $title }}
    </form>
</div>