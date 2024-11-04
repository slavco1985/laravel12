import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import { Link } from '@inertiajs/react';
import { router } from '@inertiajs/react';
import Swal from 'sweetalert2';

const Manage = (props) =>{

    const [pages, setPages] = useState(props.pages);


    const removePage = i => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                router.delete(route('pages.destroy', pages[i].id),{
                    onSuccess: () => {
                        pages.splice(i, 1);
                        setPages(Array.from(pages));
                        Swal.fire('Deleted!','PAge Removed Sucessfully','success');
                    }
                });
            }
          })
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Manage Pages" path="Pages" pathurl="" />
            <Panel title="View Pages" md="10">
            <div className="table-responsive-md">
                <table className='table'>
                    <tbody>
                        <tr>
                            <th className='slno text-center'>#</th>
                            <th>Titel</th>
                            <th>URL Name</th>
                            <th>Description</th>
                            <th className='text-center'>Action</th>
                        </tr>
                        {
                            pages && pages.map((p, i)=>{
                                return <tr key={i}>
                                        <td className='center'>{i+1}</td>
                                        <td>{ p.title }</td>
                                        <td>{ p.url }</td>
                                        <td>{ p.description }</td>
                                        <td className='text-center'>
                                            <Link href={route('pages.edit', p.id)}>
                                                <button className='btn btn-sm  me-2 btn-primary'><i className="bi bi-pencil-square"></i></button>
                                            </Link>
                                            
                                            <button onClick={removePage(i)} className='btn btn-sm btn-danger'><i className="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                            })
                        }
                        
                    </tbody>
                </table>
            </div>
            </Panel>
        </Authenticated>
    )
}
export default Manage