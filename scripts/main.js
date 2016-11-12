
var j =jQuery;

var  Posts = React.createClass({
  getInitialState(){return {posts:[],selected_post_id:""}},
  getRawMarkup(target) {
  var rawMarked = marked(target, {sanitize:false})
  return { __html:rawMarked};
  },
  componentWillMount(){
        var s = this;
      j.ajax(React_Theme_Resource.getPost)
      .done(function(data){
            s.setState({posts:data,selected_post_id:data[0]["id"]}); //set posts
            var promises = [];
        console.log(data)
        data.forEach(function(post){
          if(post["featured_media"] < 1 ){var promise = (React_Theme_Resource.defaultPromise)}
          else{var promise = j.ajax(React_Theme_Resource.getMedia + "/" + post["featured_media"]);}
              promises.push(promise);
        })
         promises.forEach(function(promise,i){
              promise.then(function(values){
                if(typeof values == "string"){s.state.posts[i]["featured_media"]  = {"source_url":values}}
                else{s.state.posts[i]["featured_media"] = values;}
                 s.setState({posts:s.state.posts});
              })

        })

      })
      .fail(function(){ console.log("FAIL")})
  },
  componentDidMount(){},
  selected_post_content(){
    var selection = this.state.posts.filter(function(post){return post["id"] == this.state.selected_post_id}.bind(this))
    return selection[0];
  },
  contentSlider(obj){
  //  console.log(obj)
        if(obj.status == false){return j("#displayapost").fadeOut("slow")}
        j("#displayapost").fadeIn("slow")
        return this.setState({selected_post_id:obj.id});

},
      render(){

            var posts = (this.state.posts);
            var display_props = {slide:this.contentSlider,selection:this.selected_post_content(),getRawMarkup:this.getRawMarkup}
            var post_props = {slide:this.contentSlider,getRawMarkup:this.getRawMarkup}
            return (

                <div>

                    {posts.map(function(post){return <Post post={post} key={post.id} {...post_props} />}.bind(this))}
                    {display_props.selection ? <DisplayAPost {...display_props}/>:null}
                </div>

            )
      }
})

//dangerouslySetInnerHTML={this.getRawMarkup()}
var Post = React.createClass({
      render(){
          var post = this.props.post;
          var style = {backgroundImage: 'url(' + post["featured_media"]["source_url"]+')'}
          return (
            <div className="post card" onClick={this.props.slide.bind(null,{status:true,id:post.id})}>
                <div style={style}>
                  <div>
                      <h4>{post.title.rendered}</h4>
                  </div>
                </div>
            </div>
          )
      }
})
//DISPLAY POST
var DisplayAPost = React.createClass({
    componentDidMount(){j("#displayapost").hide()},
    goToPost(){
      j("#displayapost").effect("puff","slow",()=>{
          window.location = this.props.selection.link;
      })

    },
    render(){
          var post = this.props.selection;
          var style = {backgroundImage: 'url(' + post["featured_media"]["source_url"]+')'}
        return (

           <div id="displayapost" class="card">

                <div style={style}>
                    <button onClick={this.props.slide.bind(null,{status:false})} className="waves-effect waves-light btn">Close</button>
                    <button onClick={this.goToPost.bind()} className="waves-effect waves-light btn">See more</button>
                </div>
                <div><div dangerouslySetInnerHTML={this.props.getRawMarkup(post["excerpt"]["rendered"])} /></div>

            </div>

        )
    }
})

ReactDOM.render(<Posts />,document.getElementById("content_space"));
