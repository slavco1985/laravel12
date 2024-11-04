import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import CategoryForm from './CategoryForm';
import EditModel from '@/Components/EditModel';
import { Modal } from 'bootstrap';
import Swal from 'sweetalert2';
import { useForm } from '@inertiajs/react';

const Manage = (props) =>{
    const [category, setCategory] = useState(props.category);
    const [edit, setEdit] = useState([]);
    const [mymodel, setMymodel] = useState([]);
    const { put, delete: destroy } = useForm();

    const editCategory = i => () =>{
        var modal = new Modal(document.getElementById('myModal'))
        modal.show();
        setMymodel(modal);
        setEdit(category[i]);
    }

    const deleteCategory = id => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                destroy(route('category.destroy', id),{
                    onSuccess: () => {
                        // setLocation((ps)=>{
                        //     return ps.filter(loc => loc.id != id);
                        // })
                        Swal.fire('Deleted!','Category Removed Successfully','success');
                    },
                    preserveState:false
                });
            }
          })
    }
    const updateFeatured = i =>() =>{
        category[i].featured = !category[i].featured;
        put(route('update-category-featured', category[i]));
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Manage Category" path="Category" pathurl="" />
            <Panel title="Add Category" md="6">
                <CategoryForm typ="add" edit="" />
                <div className="table-responsive-md">
                    <table className='table'>
                        <tbody>
                            <tr>
                                <th className='slno text-center'>ID</th>
                                <th>Icon</th>
                                <th>Category Name</th>
                                <th>Featured</th>
                                <th className='text-end pe-5'>Action</th>
                            </tr>
                            {
                                category && category.map((c, i)=>{
                                    return <tr  key={i}>
                                        <td className='slno text-center'>{c.id}</td>
                                        <td className='caticon'><img src={c.icon} alt={c.icon} /></td>
                                        <td>{c.name}</td>
                                        <td className='center'>
                                            {
                                                c.featured == 0 ? 
                                                    <i onClick={updateFeatured(i)} className="bi text-primary fs-4 bi-toggle-off"></i> 
                                                : 
                                                    <i onClick={updateFeatured(i)} className="bi text-primary fs-4 bi-toggle-on"></i>
                                            }
                                            
                                        </td>
                                        <td className='text-end pe-3 action'>
                                            <button onClick={editCategory(i)} className="btn btn-primary btn-xs"><i className="bi bi-pencil-square"></i> Edit</button>
                                            <button onClick={deleteCategory(c.id)} className="btn btn-danger btn-xs"><i className="bi bi-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                })
                            }
                        </tbody>
                    </table>
                </div>
            </Panel>
            <EditModel title="Edit Location" id="editlocation">
            <CategoryForm typ="edit" edit={edit} mymodel={mymodel} />
            </EditModel>
        </Authenticated>
    )
}
export default Manage