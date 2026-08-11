  // reveal on scroll
var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}})},{threshold:.12});
document.querySelectorAll('.reveal').forEach(function(el){io.observe(el)});

// ===== Book a demo form =====
// Set DEMO_ENDPOINT to your CRM/webhook URL to receive submissions as JSON.
// If left empty, the form opens a pre-filled email to the Explore team instead.
var DEMO_ENDPOINT = "";
var DEMO_FALLBACK_EMAIL = "Chris.Hutton@bcgexpand.com";

(function(){
  var daySel=document.getElementById('demoDay');
  var timeSel=document.getElementById('demoTime');
  if(!daySel||!timeSel) return;

  // upcoming weekdays (next ~15 working days)
  var d=new Date(); d.setHours(0,0,0,0); var added=0;
  var ph=document.createElement('option'); ph.value=''; ph.textContent='Select a day'; ph.disabled=true; ph.selected=true; daySel.appendChild(ph);
  while(added<15){
    d.setDate(d.getDate()+1);
    var dow=d.getDay();
    if(dow===0||dow===6) continue; // skip Sat/Sun
    var o=document.createElement('option');
    var iso=d.getFullYear()+'-'+String(d.getMonth()+1).padStart(2,'0')+'-'+String(d.getDate()).padStart(2,'0');
    o.value=iso;
    o.textContent=d.toLocaleDateString('en-GB',{weekday:'short',day:'numeric',month:'short'});
    daySel.appendChild(o); added++;
  }

  // times 09:00–17:00 UK, 30-min steps
  var pht=document.createElement('option'); pht.value=''; pht.textContent='Select a time'; pht.disabled=true; pht.selected=true; timeSel.appendChild(pht);
  function label(h,m){var ap=h<12?'am':'pm';var hh=h%12;if(hh===0)hh=12;return hh+':'+String(m).padStart(2,'0')+' '+ap;}
  for(var h=9;h<=17;h++){ for(var m=0;m<60;m+=30){ if(h===17&&m>0) break; var ot=document.createElement('option'); ot.value=String(h).padStart(2,'0')+':'+String(m).padStart(2,'0'); ot.textContent=label(h,m)+' UK'; timeSel.appendChild(ot);} }

  var form=document.getElementById('demoForm');
  var ok=document.getElementById('demoSuccess');
  var reEmail=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  form.addEventListener('submit', function(e){
    e.preventDefault();
    var fields=[['fName',function(v){return v.trim().length>0;}],
                ['lName',function(v){return v.trim().length>0;}],
                ['coName',function(v){return v.trim().length>0;}],
                ['coEmail',function(v){return reEmail.test(v.trim());}],
                ['demoDay',function(v){return !!v;}],
                ['demoTime',function(v){return !!v;}]];
    var valid=true, firstBad=null;
    fields.forEach(function(f){
      var el=document.getElementById(f[0]);
      var good=f[1](el.value);
      el.classList.toggle('df-err', !good);
      if(!good){ valid=false; if(!firstBad) firstBad=el; }
    });
    if(!valid){ if(firstBad) firstBad.focus(); return; }

    var dayLabel=daySel.options[daySel.selectedIndex].textContent;
    var timeLabel=timeSel.options[timeSel.selectedIndex].textContent;
    var data={
      firstName:document.getElementById('fName').value.trim(),
      lastName:document.getElementById('lName').value.trim(),
      company:document.getElementById('coName').value.trim(),
      email:document.getElementById('coEmail').value.trim(),
      preferredDay:daySel.value, preferredTime:timeSel.value,
      preferredSlot:dayLabel+' at '+timeLabel
    };

    if(DEMO_ENDPOINT){
      fetch(DEMO_ENDPOINT,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(data)}).catch(function(){});
    } else {
      var subject=encodeURIComponent('Demo request — '+data.company);
      var body=encodeURIComponent('Name: '+data.firstName+' '+data.lastName+'\nCompany: '+data.company+'\nEmail: '+data.email+'\nPreferred: '+data.preferredSlot+'\n');
      window.location.href='mailto:'+DEMO_FALLBACK_EMAIL+'?subject='+subject+'&body='+body;
    }

    document.getElementById('successName').textContent=data.firstName;
    document.getElementById('successMsg').textContent='We\u2019ve noted '+data.preferredSlot+'. The Explore team will be in touch by email to confirm.';
    form.style.display='none';
    ok.style.display='block';
  });

  // clear error styling as the user fixes a field
  form.addEventListener('input', function(e){ if(e.target.classList) e.target.classList.remove('df-err'); });
})();