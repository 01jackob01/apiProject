Vue.createApp({
  data() {
    return {
      posts: [],
    };
  },

  methods: {
    async getData() {
      try {
        let response = await fetch("http://localhost/api/produkt");
        this.posts = await response.json();
      } catch (error) {
        console.log(error);
      }
    },
  },

  created() {
    this.getData();
  },
}).mount('#app');

Vue.createApp({
  name: "App",
  data() {
    return {
      putResult: null
    }
  },
  methods: {
    fortmatResponse(res) {
      return JSON.stringify(res, null, 2);
    },
    async putData() {
      const { put_id: id, put_title, put_description, put_published } = this.$refs;
      if (id) {
        const putData = {
          title: put_title.value,
          description: put_description.value,
          published: put_published.checked,
        };
        try {
          const res = await fetch(`${baseURL}/tutorials/${id}`, {
            method: "put",
            headers: {
              "Content-Type": "application/json",
              "x-access-token": "token-value",
            },
            body: JSON.stringify(putData),
          });
          if (!res.ok) {
            const message = `An error has occured: ${res.status} - ${res.statusText}`;
            throw new Error(message);
          }
          const data = await res.json();
          const result = {
            status: res.status + "-" + res.statusText,
            headers: { "Content-Type": res.headers.get("Content-Type") },
            data: data,
          };
          this.putResult = this.fortmatResponse(result);
        } catch (err) {
          this.putResult = err.message;
        }
      }
    },
    clearPutOutput() {
      this.putResult = null;
    },
  }
}).mount('#form');

/*
Vue.createApp({
  data() {
    return {
      goals: [],
      enteredValue: ''
    };
  },
  methods: {
    addGoal() {
      this.goals.push(this.enteredValue);
      this.enteredValue = '';
    }
  }
}).mount('#app');
*/
// const buttonEl = document.querySelector('button');
// const inputEl = document.querySelector('input');
// const listEl = document.querySelector('ul');

// function addGoal() {
//   const enteredValue = inputEl.value;
//   const listItemEl = document.createElement('li');
//   listItemEl.textContent = enteredValue;
//   listEl.appendChild(listItemEl);
//   inputEl.value = '';
// }

// buttonEl.addEventListener('click', addGoal);