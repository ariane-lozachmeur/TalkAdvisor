
speakers = new Bloodhound({
    datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.speaker_name); },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    // `states` is an array of state names defined in "The Basics"
    local: speakers
  });

  $('#the-basics .typeahead').typeahead({
    minLength: 1,
    highlight: true,
    hint: true
  },
  {
    name: 'speakers',
    source:  speakers.ttAdapter(),
    displayKey: 'speaker_name'
  });

  $('.typeahead').bind('typeahead:select', function(ev, suggestion) {
      $(this).parent().parent().children('input[type= "hidden"]').val(suggestion.id);
  });