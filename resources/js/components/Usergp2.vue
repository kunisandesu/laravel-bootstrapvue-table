<template>
  <div> 

  <b-container fluid>

  <b-table  striped hover 
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filter-included-fields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      stacked="md"
      show-empty
      small
      @filtered="onFiltered"
  >

  </b-table>

    <!-- User Interface controls -->
    <b-row>

      <b-col lg="6" class="my-1">
        <b-form-group
          label="検索欄"
          label-for="filter-input"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              id="filter-input"
              v-model="filter"
              type="search"
              placeholder="氏名を入力、もしくは右側の検索したい項目をチェックし入力"
            ></b-form-input>

            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
       </b-col>

      <b-col lg="6" class="my-1">
        <b-form-group
          v-model="sortDirection"
          label="検索したい項目にチェック"
          description="Leave all unchecked to filter on all data"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
          v-slot="{ ariaDescribedby }"
        >
          <b-form-checkbox-group
            v-model="filterOn"
            :aria-describedby="ariaDescribedby"
            class="mt-1"
          >
            <b-form-checkbox value="group">組</b-form-checkbox>
            <b-form-checkbox value="course">コース</b-form-checkbox>
            <b-form-checkbox value="race_day">開催日</b-form-checkbox>
            <b-form-checkbox value="round">ラウンド</b-form-checkbox>
            <b-form-checkbox value="class">クラス</b-form-checkbox>
          </b-form-checkbox-group>
        </b-form-group>
      </b-col>

    </b-row>


    <b-row>

      <b-col lg="6" class="my-1">
        <b-form-group
          label="ソート"
          label-for="sort-by-select"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
          v-slot="{ ariaDescribedby }"
        >
          <b-input-group size="sm">
            <b-form-select
              id="sort-by-select"
              v-model="sortBy"
              :options="sortOptions"
              :aria-describedby="ariaDescribedby"
              class="w-75"
            >
              <template #first>
                <option value="">-- none --</option>
              </template>
            </b-form-select>

            <b-form-select
              v-model="sortDesc"
              :disabled="!sortBy"
              :aria-describedby="ariaDescribedby"
              size="sm"
              class="w-25"
            >
              <option :value="false">降順</option>
              <option :value="true">昇順</option>
            </b-form-select>
          </b-input-group>
        </b-form-group>
      </b-col>




    </b-row>

      <b-row>

         <b-col sm="5" md="6" class="my-1">
            <b-form-group
               label="表示項目数"
               label-for="per-page-select"
               label-cols-sm="6"
               label-cols-md="4"
               label-cols-lg="3"
               label-align-sm="right"
               label-size="sm"
               class="mb-0"
            >
            <b-form-select
               id="per-page-select"
               v-model="perPage"
               :options="pageOptions"
               size="sm"
            ></b-form-select>
            </b-form-group>
         </b-col>

     </b-row>







  </b-container>

  </div> 
</template>

<script>
  export default {
    data() {
      return {
        fields: [
          {key: 'group', label: '組', sortable: true},
          {key: 'course', label: 'コース', sortable: true},
          {key: 'name', label: '氏名', sortable: true},
          {key: 'time', label: 'タイム', sortable: true},
          {key: 'point', label: 'ポイント', sortable: true},

          {key: 'round', label: 'ラウンド', sortable: true},
          {key: 'race_day', label: '開催日', sortable: true},
          //{key: 'email', label: 'E-mail', sortable: true},
          //{key: 'year', label: '年齢', sortable: true},
          //{key: 'class', label: 'クラス', sortable: true},
          //{key: 'category', label: 'ハンデ', sortable: true},
          
        ],
        items: [],
        totalRows: 1,
        currentPage: 1,
        perPage: 100,
        pageOptions: [5, 10, 100, { value: 100, text: "Show a lot" }],

        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',

        filter: null,
        filterOn: [],
        infoModal: {
          id: 'info-modal',
          title: '',
          content: ''
        }

      }
    },
    computed: {
      sortOptions() {
        // Create an options list from our fields
        return this.fields
          .filter(f => f.sortable)
          .map(f => {
            return { text: f.label, value: f.key }
          })
      }
    },




    created() {
      axios.get('/api/usergp2s')
      .then((res) => {
        console.log(res)
        this.items = res.data
      })
      .catch((err) => {
        console.log(err)
      })
    },




    methods: {
      info(item, index, button) {
        this.infoModal.title = `Row index: ${index}`
        this.infoModal.content = JSON.stringify(item, null, 2)
        this.$root.$emit('bv::show::modal', this.infoModal.id, button)
      },
      resetInfoModal() {
        this.infoModal.title = ''
        this.infoModal.content = ''
      },
      onFiltered(filteredItems) {
        // Trigger pagination to update the number of buttons/pages due to filtering
        this.totalRows = filteredItems.length
        this.currentPage = 1
      }
    }
  }
</script>

