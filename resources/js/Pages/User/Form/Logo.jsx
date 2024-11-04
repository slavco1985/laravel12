import React, { useEffect, useState, useCallback } from 'react';
import Input from '@/Components/Input';
import { useForm } from '@inertiajs/react';
import Cropper from 'react-easy-crop'
import User from '@/Layouts/User';
import TabLink from './Shared/TabLink';
import { Link } from '@inertiajs/react';
import { router } from '@inertiajs/react';
import Path from '../Shared/Path';


const Logo = (props) =>{

    const [active, setActive] = useState('logo');
    const [typ, setTyp] = useState('');
    const [lid, setLid] = useState(props.lid)
    const [cropearea, setcropeArea] = useState([]);

    const { data, setData, post, processing, errors, reset, clearErrors } = useForm({
        image: '',
        _method: 'PUT'
    });

    const [image, setImage] = useState(props.image);
    const [crop, setCrop] = useState({ x: 0, y: 0 })
    const [zoom, setZoom] = useState(1)
    const onCropComplete = useCallback((croppedArea, croppedAreaPixels) => {
        setcropeArea(croppedAreaPixels);
    }, [])

    const fileHandler = (event) =>{
        setData(event.target.name, event.target.files[0]);
    }

    const uploadImage = (e) =>{
        e.preventDefault();
        post(route(`upload-business-logo`, {'lid':lid}),{
            preserveState: (page) => Object.keys(page.props.errors).length,
        });
    }

    const saveImage = () =>{
        let arr = {'crop' : cropearea,'lid':lid}
        router.post(route('crope-business-logo', arr))
    }

    return (
        <User>
            <Path title="Add Business Logo" />
            <div className="container">
                <div className="row new-listing">
                    <div className="col-md-10 p-0 listing-col mx-auto">
                        <div className="card shadow text-center">
                            <div className="card-header p-0">
                                 <TabLink active={active} typ={typ} lid={lid}  />
                            </div>
                            <div className="card-body tab-content p-0">
                                <div className="form-container ">
                                    <div className="row form-row">
                                        <div className="col-md-8 mx-auto">
                                            <form onSubmit={uploadImage}>
                                                <div className="row mb-3">
                                                    <div className="col-md-8">
                                                        <Input type="file" name="image" className={errors.image && 'inerror'} handleChange={fileHandler} />
                                                        {errors.image &&  <div className="smart-valid">{errors.image}</div> }
                                                    </div>
                                                    <div className="col-md-4">
                                                        <button disabled={processing} className='btn w-100 btn-primary'>Upload Image</button>
                                                    </div>
                                                </div>
                                            </form>
                                            {
                                                (image != '/storage/business/default.png') && 
                                                <div className=" row">
                                                    <div className="com-md-12 crope-cover">
                                                        <div className="crop-container">
                                                                <Cropper image={image}  crop={crop} zoom={zoom}
                                                                  onCropChange={setCrop} cropSize={{width:420, height: 280 }}
                                                                onCropComplete={onCropComplete}
                                                                onZoomChange={setZoom}
                                                                />
                                                        </div>
                                                    </div>
                                                
                                                    <div className="col-md-8 mt-3 ">
                                                        <div className="controls">
                                                            <input  type="range"  value={zoom}
                                                            min={1}  max={3} step={0.1}  aria-labelledby="Zoom"
                                                            onChange={(e) => {
                                                                setZoom(e.target.value)
                                                            }}
                                                            className="zoom-range"
                                                            />
                                                            </div>
                                                    </div>
                                                    <div className="col-md-4 mt-3 ">
                                                            <button onClick={saveImage} className="btn w-100 btn-primary">Save and Continue</button>
                                                    </div>
                                                </div>
                                            }
                                       </div>
                                    </div>
                                </div>
                                <div className="card-footer text-muted">
                                    <div className="row">
                                        <div className="col-md-6 pt-2 left">
                                            <p>Step 2 of 7</p>
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
            </div>
        </User>
    )
}
export default Logo