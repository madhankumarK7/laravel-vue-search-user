<template>
    <div class="container mx-auto p-4">
        <div class="flex items-center mb-4 gap-2">
            <h4 class="text-lg font-bold mr-2">Search</h4>
            <input 
                type="text" 
                v-model="searchWord"
                class="p-2 border border-gray-300 rounded w-1/2"
                placeholder="Search name/designation/department"
            >
            <div class="ml-4 flex items-center w-1/3">
                <label for="sort" class="mr-2 font-bold">Sort By:</label>
                <select v-model="sortKey" class="p-2 border border-gray-300 rounded w-full" @change="sort('sortKey',$event)">
                    <option value="name">Name</option>
                    <option value="department">Department</option>
                    <option value="designation">Designation</option>
                </select>
            </div>

            <div class="ml-4 flex items-center w-1/3">
                <label for="order" class="mr-2 font-bold">Sort Order:</label>
                <select v-model="sortOrder" class="p-2 border border-gray-300 rounded w-full" @change="sort('sortOrder',$event)">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </div>

            <button 
                @click="resetAction" 
                class="ml-4 p-2 border border-gray-300 bg-gray-200 rounded hover:bg-gray-300"
            >
                Reset
            </button>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4" v-if="filteredUsers.length!==0">
            <div v-for="user in filteredUsers" :key="user.id" class="bg-white p-4 rounded-lg shadow-lg">
                <h5 class="text-xl font-semibold">{{ user.name }}</h5>
                <p class="text-gray-700 mt-1">{{ user.designation.name }}</p>
                <p class="text-gray-500">{{ user.department.name }}</p>
            </div>
        </div>
        <div v-else>
            <p class="text-center text-gray-500">No users found.</p>
        </div>
    </div>
</template>

<script>
export default{
    name: 'Users List',
    props: ['users'],
    data(){
        return {
            searchWord : '',
            sortKey: 'name',
            sortOrder: 'asc',
        }
    },
    mounted(){
        
    },
    methods:{
        resetAction(){
            this.searchWord = '';
            this.sortKey = 'name';
            this.sortOrder = 'asc';
        },
        sort(action,event){
            
            if(action=='sortKey')
                this.sortKey=event.target.value;
            if(action=='sortOrder')
                this.sortOrder=event.target.value;

            return this.filteredUsers.sort((a, b) => {
                let modifyOrder = this.sortOrder === 'asc' ? 1 : -1;
                if (this.sortKey === 'name') {
                    return (a.name > b.name ? 1 : -1) * modifyOrder;
                } else if (this.sortKey === 'department') {
                    return (a.department.name > b.department.name ? 1 : -1) * modifyOrder;
                } else if (this.sortKey === 'designation') {
                    return (a.designation.name > b.designation.name ? 1 : -1) * modifyOrder;
                }
                return 0;
            }) ;            
        }
    },
    computed:{
        filteredUsers(){
            let tempUsers = this.users;
            console.log(tempUsers);
            if(this.searchWord!='')
            {
                tempUsers = tempUsers.filter(user => {
                    return user.name.toLowerCase().includes(this.searchWord.toLowerCase()) ||
                       user.department.name.toLowerCase().includes(this.searchWord.toLowerCase()) ||
                       user.designation.name.toLowerCase().includes(this.searchWord.toLowerCase());
                });
            }
            return tempUsers;
        }
    }
}
</script>