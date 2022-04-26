<template>
    <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle ps-lg-0" href="#"
                                         data-bs-toggle="dropdown"><i class="ci-view-grid me-2"></i>Departments</a>
            <div class="dropdown-menu px-2 pb-4">
                <div class="d-flex flex-wrap flex-sm-nowrap" v-for="(department, itemObjKey) in departments" :key="department.id"  v-if="checkOuterLoop(itemObjKey+1, departments.length)">
                    <router-link  v-for="(department, itemObjKey) in departments" :key="department.id" :to="{name: 'Shop', params:{ department: department.id}}"  v-if="checkInnerLoop(itemObjKey, departments.length)" class="mega-dropdown-column pt-3 pt-sm-4 px-2 px-lg-3">
                        <div class="widget widget-links" ><a
                            class="d-block overflow-hidden rounded-3 mb-3" href="#"><img
                            :src="'img/shop/departments/'+department.image" alt="Clothing"></a>
                            <h6 class="fs-base mb-2">{{department.name}}</h6>
                        </div>
                    </router-link>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    name: "Departments.vue",
    props:{
        departments:{
            required:true,
            type:Array
        }
    },
    created() {
    },
    data(){
        return {
            outerIndex:1,
            previousIndex:3,
            isFirstIteration: false,
            nextIteration: false,
        }
    },
    methods:{
        checkOuterLoop(index, length)
        {
            if(index <= length){
                if(index === 1){
                    this.outerIndex =  4;
                    this.isFirstIteration = true;
                    return true;
                }
                this.isFirstIteration = false;
                if(index == this.outerIndex){
                    this.previousIndex = this.outerIndex;
                    this.nextIteration = true;
                    this.outerIndex =  index + 4;
                    return true;
                }
                this.nextIteration = false;
            }
        },
        checkInnerLoop(index, length) {
            if(index < length){
                if(this.isFirstIteration) {
                    if (index < 4) {
                        return true;
                    }
                }
                if(this.nextIteration && index >= this.previousIndex && index < this.outerIndex ){
                        return true;
                }
            }
        },
    }
}
</script>

<style scoped>

</style>
