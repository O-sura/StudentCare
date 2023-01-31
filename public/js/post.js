
export class CommunityPost{
    constructor(id,title,author,postedTime,category,votes,thumbnail,body,user){
        this.postID = id;
        this.title = title;
        this.author = author;
        this.postedTime = postedTime.split(" ")[0];
        this.category = category;
        this.votes = votes;
        this.thumbnail = thumbnail;
        this.postBody = body;
        this.loggedUser = user;
    }

    createPost(){
        let controllers = '';
        if(this.author === this.loggedUser){
            controllers =  `
                <div class="buttons">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <i class="fa-solid fa-trash"></i>
                </div>
            `
        }

        return `
        <div class="parent">
        <div class="icon-text-button">
            <button class="icon-btn" id="up"><i class="fa-solid fa-up-long"></i></button>
            <p id="vote-count">${this.votes}</p>
            <button class="icon-btn" id="down"><i class="fa-solid fa-down-long"></i></button>
        </div>
        <div class="div1">
            <img src="http://localhost/StudentCare/public/img/community/${this.thumbnail}"  alt="thumbnail" class="thumbnail">
        </div>
        <div class="div2">
            <div class="top">
                <h1>${this.title}</h1>
                ${controllers}
            </div>
            <div class="meta-data">
                <h4>By: ${this.author}</h4>
                <h4>${this.postedTime})</h4>
                <h4>Category: ${this.category}</h4>
            </div>
            <div class="content">
                ${this.postBody}
            </div>
            <div class="options">
                <a href="./view_post/${this.postID}"><input type="button" value="Read More" class="button"></a>
                <div class="bottom">
                    <div class="option">
                        <i class="fa-regular fa-bookmark"></i>
                        <span>Save</span>
                    </div>
                    <div class="option">
                        <i class="fa-solid fa-flag"></i>
                        <span>Report</span>
                    </div>
                </div>
            </div>
        </div>
</div>
        `
    }
}