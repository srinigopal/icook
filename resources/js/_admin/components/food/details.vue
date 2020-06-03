<template>
    <div class="main-content">
       eeeeeeeeeeeeeeeeeeesssssssssssss
	   
	   
	   dddddddd
    </div>
</template>
<script>

export default {
     metaInfo: {
    // if no subcomponents specify a metaInfo.title, this title will be used
    title: "Basic Forms"
  },
    data(){
        return{
            date:new Date(),
            form:{
                name:'',
                email:'',
                fName:'',
                lName:'',
                phone:''
            },
            selected: 'first',
        options: [
          { text: 'First radio', value: 'first' },
          { text: 'Second radio', value: 'second' },
          { text: 'Third radio', value: 'third' }
        ]
        };
    }
}
</script>
