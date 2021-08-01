import React, { useContext } from "react";
import { DataContext } from "../services/DataService";
import { Input, Form } from "antd";

const { Item } = Form;

export const Location = () => {
    const {
        state,
        setState,
        district,
        setDistrict,
        taluk,
        setTaluk,
        gramaPanchayath,
        setGramaPanchayath,
    } = useContext(DataContext);

    return (
        <>
            <Item
                name="state"
                label="Place of Residence: State"
                rules={[
                    {
                        required: true,
                    },
                ]}
            >
                <Input
                    value={state}
                    onChange={setState}
                    type="text"
                    placeholder="Eg: Kerala"
                />
            </Item>
            <Item
                name="district"
                label="District"
                rules={[
                    {
                        required: true,
                    },
                ]}
            >
                <Input
                    value={district}
                    onChange={setDistrict}
                    type="text"
                    placeholder="Eg: Ernakulam"
                />
            </Item>
            <Item
                name="taluk"
                label="Taluk"
                rules={[
                    {
                        required: true,
                    },
                ]}
            >
                <Input
                    value={taluk}
                    onChange={setTaluk}
                    type="text"
                    placeholder="Eg: Kochi"
                />
            </Item>

            <Item
                name="grama_panchayath"
                label="Grama Panchayath / Municipality / Corporation"
                rules={[
                    {
                        required: true,
                    },
                ]}
            >
                <Input
                    value={gramaPanchayath}
                    onChange={setGramaPanchayath}
                    type="text"
                    placeholder="Eg: Kalamassery"
                />
            </Item>
        </>
    );
};
