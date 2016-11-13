var j = jQuery;


var Header = React.createClass({
      getInitialState(){return {menus:[]};},
      componentWillMount(){
        var promises = [],s = this;
        let promise = j.ajax(React_Theme_Resource.getMenu)
        .then(function(data){
              data.forEach(function(menu){promises.push(j.ajax(menu.meta.links.self));})
              promises.forEach(function(promise){
                promise.then(function(data,i){
                    s.state.menus.push(data);
                    s.setState({menus:s.state.menus});
                })
              })
        })
        .fail(function(reason){
          console.log(reason)
        })
      },
      render(){
          var main_menu = ((this.state.menus).filter(function(menu){return menu.name == "Main"}))[0];
            //console.log(main_menu)
          return (

              <div id="header" className="card row">
                  {main_menu ? <Main_Navigation  menu ={main_menu}/> :null}
                  <SearchBar />
              </div>

          )
      }
})


var Main_Navigation = React.createClass({
    render(){
            return (
                      <div className="col s7">
                        <div className="row mainNav">
                                    {this.props.menu.items.map(item => {
                                    return (
                                          <li className="col s2"><a href={item.url}>{item.title}</a></li>
                                    )
                                  })

                                }
                        </div>
                      </div>
                )
    }
})

var SearchBar = React.createClass({
  render(){
    return (
        <form className="searchspace col s3">
           <div className="input-field">
             <input id="search" type="search" required/>
             <label for="search"><i className="material-icons">search</i></label>
             <i className="material-icons">close</i>
           </div>
       </form>
    )
  }
})

ReactDOM.render(<Header/>,document.getElementById("header_space"));
