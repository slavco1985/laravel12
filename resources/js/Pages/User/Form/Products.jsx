import React, { useState } from 'react';
import Input from '@/Components/Input';
import { useForm , Link} from '@inertiajs/react';
import TabLink from './Shared/TabLink';
import User from '@/Layouts/User';
import EditProduct from './EditProduct';
import { Modal } from 'bootstrap';
import Swal from 'sweetalert2';
import Path from '../Shared/Path';



const Products = (props) =>{

    const [active, setActive] = useState('products');
    const [typ, setTyp] = useState('');
    const [lid, setLid] = useState(props.lid)
    const [products, setProducts] = useState(props.product);
    const [edit, setEdit] = useState({name:'',price:''});
    const [mymodel, setMymodel] = useState([]);

    const { data, setData, post, processing, errors, reset, clearErrors, delete: destroy } = useForm({
        name: '',
        image: '',
        price: '',
        lid: props.lid 
    });

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    };

    const handleFile = (event) =>{
        setData(event.target.name, event.target.files[0]);
    }

    const handleSubmiton = (e) =>{
        e.preventDefault();
        post(route('product.store'),{
            preserveState: (page) => Object.keys(page.props.errors).length,
        });
    }
    
    const handleEdit = i => () =>{
        setEdit(products[i])
        var modal = new Modal(document.getElementById('myModal'), {
            keyboard: false
        })
        modal.show()
        setMymodel(modal);
    }
    const handleDelete = i => () =>{
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                destroy(route('product.destroy', products[i].id),{
                    onSuccess: () => {
                        Swal.fire('Deleted!','Product Removed Sucessfully','success',);
                    },
                    preserveState:false
                });
            }
          })
    }

    return (
        <User>
            <Path title="Products" />
            <div className="container">
                <div className="row new-listing">
                    <div className="col-md-10 p-0 listing-col mx-auto">
                        <div className="card shadow text-center">
                            <div className="card-header p-0">
                                <TabLink active={active} typ={typ} lid={lid}  />
                            </div>
                            <div className="card-body tab-content p-0">
                                <div className="form-container ">
                                {
                                        errors.limit && 
                                            <div className="alert mb-4 alert-danger" role="alert">
                                                You reached your Maximum Limit 
                                                <Link className='fw-bolder text-decoration-underline' href={route('choos-package')}> Upgrade your plan </Link> 
                                                to add more
                                            </div>
                                    }
                                    <form onSubmit={handleSubmiton}>
                                        <div className="row form-row">
                                            <div className="col-md-4">
                                                <Input type='text' className={errors.name && 'inerror'} name="name" handleChange={onHandleChange} placeholder="Enter Product Name" />
                                                {errors.name &&  <div className="smart-valid">{errors.name}</div> }
                                            </div>
                                            <div className="col-md-4">
                                                <Input type='file' className={errors.image && 'inerror'} name="image" handleChange={handleFile} placeholder="Enter Product Image" />
                                                {errors.image &&  <div className="smart-valid">{errors.image}</div> }
                                            </div>
                                            <div className="col-md-3">
                                                <Input type='number' className={errors.price && 'inerror'} name="price" handleChange={onHandleChange} placeholder="Enter Price" />
                                                {errors.price &&  <div className="smart-valid">{errors.price}</div> }
                                            </div>
                                            <div className="col-md-1">
                                                <button disabled={processing} type='submit' className="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div className="row  mb-4 pb-1">
                                        {
                                            products && products.map((p, i)=>{
                                                return <div key={i} className="col-md-6 mb-3">
                                                            <div className="row product-cover align-content-center align-items-center p-2 m-0 shado-1">
                                                                <div className="col-md-2 p-0">
                                                                    <img  src={p.image} alt="" />
                                                                </div>
                                                                <div className="col-md-8 align-items-center  text-start">
                                                                    <h4 className='fs-6 text-truncate mb-0'>{p.name}</h4>  
                                                                    <small><b>{props.currency}{p.price}</b> </small>
                                                                </div>
                                                                <div className="col-md-2 cp">
                                                                    <i onClick={handleEdit(i)} className="bi pe-2 bi-pencil-square"></i>
                                                                    <i onClick={handleDelete(i)} className="bi bi-trash3"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                            })
                                        }
                                        

                                    </div>
                                </div>
                            </div>
                            <div className="card-footer text-muted">
                                    <div className="row">
                                        <div className="col-md-6 pt-2 left">
                                            <p>Step 5 of 8</p>
                                        </div>
                                        <div className="col-md-6 right">
                                            <Link href={route('user-dashboard')}>
                                                <button className="btn  btn-light">Skip and Go to Dashboard</button> 
                                            </Link>
                                           
                                        </div>
                                    </div>
                                
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <EditProduct edit={edit} mymodel={mymodel} />
        </User>
    )
}
export default Products;