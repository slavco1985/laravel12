import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import { Link } from '@inertiajs/react';
import { router } from '@inertiajs/react';
import Swal from 'sweetalert2';
import Pagination from '@/Core/Pagination';

const Manage = (props) =>{

    const [blogs, setBlogs] = useState(props.blogs.data);
    const [links, setLinks] = useState(props.blogs.links);

    const removeBlog = i => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                Inertia.delete(route('blog.destroy', blogs[i].id),{
                    onSuccess: () => {
                        blogs.splice(i, 1);
                        setBlogs(Array.from(blogs));
                        Swal.fire('Deleted!','Blog Removed Sucessfully','success');
                    }
                });
            }
          })
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Manage Blog" path="Blog" pathurl="" />
            <div className="row">
                {
                    blogs && blogs.map((b, i)=>{
                        return <div key={i} className="col-md-4 mb-3">
                            <div className="card shadow-sm" >
                                <div className="imgcover p-2 pb-0">
                                    <img src={b.resize} className="card-img-top rounded" alt="..." />
                                </div>
                               
                                <div className="card-body border-bottom">
                                    <h6 className="card-title fs-6 text-truncate mb-0">{ b.title }</h6>
                                </div>
                                <div className="card-body text-end">
                                    <Link href={route('blog.edit', b.id)} className="card-link"><i className="bi bi-pencil-square"></i> Edit</Link>
                                    <a onClick={removeBlog(i)} className="card-link cp"><i className="bi bi-trash3"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    })
                }
            </div>
            { links.length === 3 ? '' :
                   <div className="card-footer border-0">
                        <div className="row">
                            <div className="col-md-6 pt-2">
                                
                            </div>
                            <div className="col-md-6">
                                <Pagination links={links} />
                            </div>
                        </div>
                        
                    </div>
                }
        </Authenticated>
    )
}
export default Manage